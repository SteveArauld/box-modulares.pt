# Non-interactive Composer install for box-modulares.pt-main
# Writes INSTALL-REPORT.txt; does not start a long-running server.
$ErrorActionPreference = "Continue"
Set-Location $PSScriptRoot
$report = Join-Path $PSScriptRoot "INSTALL-REPORT.txt"
$lines = New-Object System.Collections.Generic.List[string]
function Log([string]$m) {
    Write-Host $m
    $lines.Add(("[{0}] {1}" -f (Get-Date -Format "HH:mm:ss"), $m)) | Out-Null
}

Log "=== install-deps.ps1 start ==="
Log ("cwd: " + (Get-Location).Path)

function Find-Php {
    $cmd = Get-Command php -ErrorAction SilentlyContinue
    if ($cmd -and $cmd.Source) { return $cmd.Source }
    foreach ($root in @("c:\wamp2", "c:\wamp64", "c:\wamp", "c:\xampp", "C:\laragon")) {
        if (-not (Test-Path $root)) { continue }
        $binPhp = Join-Path $root "bin\php"
        if (Test-Path $binPhp) {
            $dirs = Get-ChildItem $binPhp -Directory -ErrorAction SilentlyContinue | Sort-Object Name -Descending
            foreach ($d in $dirs) {
                $exe = Join-Path $d.FullName "php.exe"
                if (Test-Path $exe) { return $exe }
            }
        }
        $xampp = Join-Path $root "php\php.exe"
        if (Test-Path $xampp) { return $xampp }
        $laragon = Join-Path $root "bin\php"
        if (Test-Path $laragon) {
            $dirs = Get-ChildItem $laragon -Directory -ErrorAction SilentlyContinue | Sort-Object Name -Descending
            foreach ($d in $dirs) {
                $exe = Join-Path $d.FullName "php.exe"
                if (Test-Path $exe) { return $exe }
            }
        }
    }
    # Deep search under wamp2 only (bounded)
    if (Test-Path "c:\wamp2") {
        $found = Get-ChildItem "c:\wamp2" -Filter "php.exe" -Recurse -ErrorAction SilentlyContinue |
            Where-Object { $_.FullName -match '\\php\\?\\?[^\\]*\\php\.exe$' -or $_.FullName -match '\\php\\php\.exe$' -or $_.FullName -match '\\bin\\php\\' } |
            Select-Object -First 5
        foreach ($f in $found) { if (Test-Path $f.FullName) { return $f.FullName } }
        $any = Get-ChildItem "c:\wamp2" -Filter "php.exe" -Recurse -ErrorAction SilentlyContinue | Select-Object -First 1
        if ($any) { return $any.FullName }
    }
    return $null
}

function Find-Composer([string]$php) {
    $cmd = Get-Command composer -ErrorAction SilentlyContinue
    if ($cmd -and $cmd.Source) { return @{ Type = "exe"; Path = $cmd.Source } }
    $cmdBat = Get-Command composer.bat -ErrorAction SilentlyContinue
    if ($cmdBat -and $cmdBat.Source) { return @{ Type = "exe"; Path = $cmdBat.Source } }
    $localPhar = Join-Path $PSScriptRoot "composer.phar"
    if (Test-Path $localPhar) { return @{ Type = "phar"; Path = $localPhar } }
    foreach ($p in @(
        "$env:LOCALAPPDATA\ComposerSetup\bin\composer.bat",
        "$env:APPDATA\Composer\composer.bat",
        "C:\ProgramData\ComposerSetup\bin\composer.bat"
    )) {
        if (Test-Path $p) { return @{ Type = "exe"; Path = $p } }
    }
    return $null
}

# --- PHP ---
$php = Find-Php
if (-not $php) {
    Log "[FAIL] PHP not found under PATH / wamp2 / wamp / xampp / laragon"
    $lines | Set-Content -Path $report -Encoding UTF8
    exit 1
}
Log "[OK] PHP path: $php"
try {
    $ver = & $php -v 2>&1 | Out-String
    Log ("[OK] PHP version: " + ($ver.Trim() -split "`n")[0])
} catch {
    Log "[FAIL] php -v: $_"
}

# --- .env ---
if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env" -Force
    Log "[OK] .env created from .env.example"
} else {
    Log "[OK] .env exists"
}

# Ensure sqlite DB path in .env
$envText = Get-Content ".env" -Raw -ErrorAction SilentlyContinue
if ($envText -match '(?m)^DB_CONNECTION=sqlite' -and $envText -notmatch '(?m)^DB_DATABASE=') {
    $envText = $envText -replace '(?m)^# DB_DATABASE=.*', 'DB_DATABASE=database/database.sqlite'
    if ($envText -notmatch '(?m)^DB_DATABASE=') {
        $envText = $envText -replace '(?m)^DB_CONNECTION=sqlite\s*', "DB_CONNECTION=sqlite`r`nDB_DATABASE=database/database.sqlite`r`n"
    }
    Set-Content ".env" -Value $envText -Encoding UTF8 -NoNewline
    Log "[OK] DB_DATABASE set for sqlite"
}

# sqlite file
if (-not (Test-Path "database\database.sqlite")) {
    New-Item -ItemType File -Path "database\database.sqlite" -Force | Out-Null
    Log "[OK] database/database.sqlite created"
} else {
    Log "[OK] database/database.sqlite exists"
}

# --- Composer ---
$composer = Find-Composer $php
if (-not $composer) {
    Log "[..] Downloading composer.phar via PHP..."
    $installer = Join-Path $PSScriptRoot "composer-setup.php"
    $phar = Join-Path $PSScriptRoot "composer.phar"
    try {
        # Official installer
        $setupCode = @'
<?php
copy('https://getcomposer.org/installer', 'composer-setup.php');
'@
        # Prefer direct phar download (simpler)
        $dl = @'
<?php
$url = 'https://getcomposer.org/download/latest-stable/composer.phar';
$out = __DIR__ . '/composer.phar';
$data = @file_get_contents($url);
if ($data === false) {
    // fallback fopen
    $ctx = stream_context_create(['http' => ['timeout' => 120], 'ssl' => ['verify_peer' => true]]);
    $data = @file_get_contents($url, false, $ctx);
}
if ($data === false || strlen($data) < 10000) {
    fwrite(STDERR, "Failed to download composer.phar\n");
    exit(1);
}
file_put_contents($out, $data);
echo "Downloaded " . strlen($data) . " bytes\n";
'@
        $dlPath = Join-Path $PSScriptRoot "_download_composer.php"
        Set-Content -Path $dlPath -Value $dl -Encoding UTF8
        $out = & $php $dlPath 2>&1 | Out-String
        Log $out.Trim()
        Remove-Item $dlPath -Force -ErrorAction SilentlyContinue
        if (Test-Path $phar) {
            $composer = @{ Type = "phar"; Path = $phar }
            Log "[OK] composer.phar downloaded"
        } else {
            Log "[FAIL] composer.phar download failed"
            $lines | Set-Content -Path $report -Encoding UTF8
            exit 1
        }
    } catch {
        Log "[FAIL] composer download: $_"
        $lines | Set-Content -Path $report -Encoding UTF8
        exit 1
    }
}

if ($composer.Type -eq "phar") {
    Log ("[OK] Composer: php " + $composer.Path)
    try {
        $cv = & $php $composer.Path -V 2>&1 | Out-String
        Log ("[OK] " + $cv.Trim())
    } catch { Log "composer -V: $_" }
} else {
    Log ("[OK] Composer: " + $composer.Path)
    try {
        $cv = & $composer.Path -V 2>&1 | Out-String
        Log ("[OK] " + $cv.Trim())
    } catch { Log "composer -V: $_" }
}

# --- composer install ---
if (-not (Test-Path "vendor\autoload.php")) {
    Log "[..] composer install --no-interaction ..."
    if ($composer.Type -eq "phar") {
        & $php $composer.Path install --no-interaction --prefer-dist 2>&1 | ForEach-Object { Log $_ }
        $code = $LASTEXITCODE
    } else {
        & $composer.Path install --no-interaction --prefer-dist 2>&1 | ForEach-Object { Log $_ }
        $code = $LASTEXITCODE
    }
    if ($code -ne 0 -and -not (Test-Path "vendor\autoload.php")) {
        Log "[FAIL] composer install exit $code"
        $lines | Set-Content -Path $report -Encoding UTF8
        exit $code
    }
    Log "[OK] composer install finished (exit=$code)"
} else {
    Log "[OK] vendor/autoload.php already present"
}

$autoload = Test-Path "vendor\autoload.php"
Log ("vendor/autoload.php exists: " + $autoload)

# --- APP_KEY ---
$envNow = Get-Content ".env" -Raw
if ($envNow -match '(?m)^APP_KEY=\s*$' -or $envNow -match '(?m)^APP_KEY=$') {
    Log "[..] php artisan key:generate --force"
    & $php artisan key:generate --force 2>&1 | ForEach-Object { Log $_ }
} else {
    # still force-generate if placeholder empty-ish
    if ($envNow -match '(?m)^APP_KEY=base64:\s*$') {
        & $php artisan key:generate --force 2>&1 | ForEach-Object { Log $_ }
    } else {
        Log "[OK] APP_KEY already set"
        # Prefer artisan-generated key once vendor exists
        if ($autoload) {
            & $php artisan key:generate --force 2>&1 | ForEach-Object { Log $_ }
            Log "[OK] APP_KEY regenerated via artisan"
        }
    }
}

# Optional migrate (safe for empty sqlite)
if ($autoload) {
    Log "[..] php artisan migrate --force (optional)"
    & $php artisan migrate --force 2>&1 | ForEach-Object { Log $_ }
}

Log "=== DONE ==="
Log "Next: php artisan serve --host=127.0.0.1 --port=8000"
Log "Or:   .\\start-server.bat"
Log ("PHP=" + $php)
if ($composer.Type -eq "phar") { Log ("COMPOSER=php " + $composer.Path) } else { Log ("COMPOSER=" + $composer.Path) }
Log ("vendor/autoload.php=" + (Test-Path "vendor\autoload.php"))

$lines | Set-Content -Path $report -Encoding UTF8
Write-Host ""
Write-Host "Report written to INSTALL-REPORT.txt" -ForegroundColor Cyan
if (Test-Path "vendor\autoload.php") { exit 0 } else { exit 1 }
