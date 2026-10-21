# Laravel local setup - box-modulares.pt-main
$ErrorActionPreference = "Continue"
Set-Location $PSScriptRoot
Write-Host "=== NovaTerra / box-modulares - Setup local ===" -ForegroundColor Cyan

function Find-Php {
    $cmd = Get-Command php -ErrorAction SilentlyContinue
    if ($cmd) { return $cmd.Source }
    foreach ($root in @("c:\wamp2", "c:\wamp64", "c:\wamp", "c:\xampp")) {
        $phpRoot = Join-Path $root "bin\php"
        if (Test-Path $phpRoot) {
            $dirs = Get-ChildItem $phpRoot -Directory -ErrorAction SilentlyContinue | Sort-Object Name -Descending
            foreach ($d in $dirs) {
                $exe = Join-Path $d.FullName "php.exe"
                if (Test-Path $exe) { return $exe }
            }
        }
        $xampp = Join-Path $root "php\php.exe"
        if (Test-Path $xampp) { return $xampp }
    }
    return $null
}

function Find-Composer {
    $cmd = Get-Command composer -ErrorAction SilentlyContinue
    if ($cmd) { return $cmd.Source }
    $candidates = @(
        "$env:LOCALAPPDATA\Composer\vendor\bin\composer.bat",
        "$env:APPDATA\Composer\vendor\bin\composer.bat"
    )
    foreach ($c in $candidates) {
        if (Test-Path $c) { return $c }
    }
    return $null
}

$php = Find-Php
if (-not $php) {
    Write-Host "[ERREUR] PHP introuvable. Active WAMP (PHP 8.3+)." -ForegroundColor Red
    exit 1
}
Write-Host "[OK] PHP: $php" -ForegroundColor Green
& $php -v

if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env"
    Write-Host "[OK] .env cree"
}

$envPath = ".env"
$c = Get-Content $envPath -Raw
$replacements = @{
    '(?m)^APP_ENV=.*'              = 'APP_ENV=local'
    '(?m)^APP_DEBUG=.*'            = 'APP_DEBUG=true'
    '(?m)^APP_URL=.*'              = 'APP_URL=http://127.0.0.1:8000'
    '(?m)^APP_LOCALE=.*'           = 'APP_LOCALE=pt'
    '(?m)^APP_FALLBACK_LOCALE=.*'  = 'APP_FALLBACK_LOCALE=es'
    '(?m)^DB_CONNECTION=.*'        = 'DB_CONNECTION=sqlite'
    '(?m)^#?\s*DB_DATABASE=.*'     = 'DB_DATABASE=database/database.sqlite'
    '(?m)^MAIL_MAILER=.*'          = 'MAIL_MAILER=log'
    '(?m)^SESSION_DRIVER=.*'       = 'SESSION_DRIVER=file'
    '(?m)^CACHE_STORE=.*'          = 'CACHE_STORE=file'
    '(?m)^QUEUE_CONNECTION=.*'     = 'QUEUE_CONNECTION=sync'
}
foreach ($k in $replacements.Keys) {
    $c = [regex]::Replace($c, $k, $replacements[$k])
}
Set-Content -Path $envPath -Value $c -NoNewline

if (-not (Test-Path "database\database.sqlite")) {
    New-Item -ItemType File -Path "database\database.sqlite" -Force | Out-Null
    Write-Host "[OK] database.sqlite cree"
}

$composer = Find-Composer
if (-not (Test-Path "vendor\autoload.php")) {
    Write-Host "[..] composer install ..." -ForegroundColor Yellow
    if ($composer) {
        & $composer install --no-interaction
    } else {
        if (-not (Test-Path "composer.phar")) {
            Invoke-WebRequest -Uri "https://getcomposer.org/download/latest-stable/composer.phar" -OutFile "composer.phar"
        }
        & $php composer.phar install --no-interaction
    }
    if ($LASTEXITCODE -ne 0) {
        Write-Host "[ERREUR] composer install" -ForegroundColor Red
        exit 1
    }
}

if (-not (Select-String -Path ".env" -Pattern "^APP_KEY=base64:" -Quiet)) {
    & $php artisan key:generate --force
}

Write-Host "[..] migrate ..." -ForegroundColor Yellow
& $php artisan migrate --force
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERREUR] migrate" -ForegroundColor Red
    exit 1
}

Write-Host "[..] seed catalogue (1-3 min possibles) ..." -ForegroundColor Yellow
& $php artisan db:seed --force

if (-not (Test-Path "public\storage")) {
    & $php artisan storage:link 2>$null
}

$npm = Get-Command npm -ErrorAction SilentlyContinue
if ($npm) {
    if (-not (Test-Path "node_modules")) {
        Write-Host "[..] npm install ..." -ForegroundColor Yellow
        npm install
    }
    if (Test-Path "node_modules") {
        Write-Host "[..] npm run build ..." -ForegroundColor Yellow
        npm run build
    }
} else {
    Write-Host "[INFO] npm absent - assets public/ utilises" -ForegroundColor DarkYellow
}

Write-Host ""
Write-Host "============================================" -ForegroundColor Green
Write-Host "  Setup OK - http://127.0.0.1:8000" -ForegroundColor Green
Write-Host "============================================" -ForegroundColor Green
Write-Host "CTRL+C pour arreter le serveur"
& $php artisan serve --host=127.0.0.1 --port=8000
