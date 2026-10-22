@echo off
setlocal EnableExtensions EnableDelayedExpansion
cd /d "%~dp0"
title box-modulares - setup local
color 0A
echo.
echo ============================================
echo   NovaTerra / box-modulares - Setup local
echo ============================================
echo.

REM ---------- PHP ----------
set "PHP="
where php >nul 2>&1 && for /f "delims=" %%i in ('where php') do (
  if not defined PHP set "PHP=%%i"
)

if not defined PHP (
  for %%R in (c:\wamp2 c:\wamp64 c:\wamp c:\xampp) do (
    if exist "%%R\bin\php\" (
      for /f "delims=" %%i in ('dir /b /ad /o-n "%%R\bin\php\php*" 2^>nul') do (
        if exist "%%R\bin\php\%%i\php.exe" if not defined PHP set "PHP=%%R\bin\php\%%i\php.exe"
      )
    )
  )
)

if not defined PHP if exist "c:\xampp\php\php.exe" set "PHP=c:\xampp\php\php.exe"

if not defined PHP (
  echo [ERREUR] PHP introuvable.
  echo Ouvre WAMP, active PHP 8.3+, ou ajoute php.exe au PATH.
  pause
  exit /b 1
)

echo [OK] PHP: %PHP%
"%PHP%" -v
echo.

REM ---------- Composer ----------
set "COMPOSER="
where composer >nul 2>&1 && for /f "delims=" %%i in ('where composer') do (
  if not defined COMPOSER set "COMPOSER=%%i"
)
if not defined COMPOSER if exist "%LOCALAPPDATA%\Composer\vendor\bin\composer.bat" set "COMPOSER=%LOCALAPPDATA%\Composer\vendor\bin\composer.bat"
if not defined COMPOSER if exist "%APPDATA%\Composer\vendor\bin\composer.bat" set "COMPOSER=%APPDATA%\Composer\vendor\bin\composer.bat"

if not defined COMPOSER (
  echo [INFO] Composer global introuvable - telechargement local composer.phar ...
  if not exist composer.phar (
    powershell -NoProfile -ExecutionPolicy Bypass -Command ^
      "Invoke-WebRequest -Uri 'https://getcomposer.org/download/latest-stable/composer.phar' -OutFile 'composer.phar'"
  )
  if not exist composer.phar (
    echo [ERREUR] Impossible de telecharger composer.phar
    pause
    exit /b 1
  )
  set "COMPOSER_CMD=%PHP% composer.phar"
) else (
  echo [OK] Composer: %COMPOSER%
  set "COMPOSER_CMD=%COMPOSER%"
)
echo.

REM ---------- .env ----------
if not exist ".env" (
  copy /Y ".env.example" ".env" >nul
  echo [OK] .env cree depuis .env.example
)

REM Forcer config locale (PowerShell)
powershell -NoProfile -ExecutionPolicy Bypass -Command ^
  "$p='.env'; $c=Get-Content $p -Raw; " ^
  "$c=$c -replace '(?m)^APP_ENV=.*','APP_ENV=local'; " ^
  "$c=$c -replace '(?m)^APP_DEBUG=.*','APP_DEBUG=true'; " ^
  "$c=$c -replace '(?m)^APP_URL=.*','APP_URL=http://127.0.0.1:8000'; " ^
  "$c=$c -replace '(?m)^APP_LOCALE=.*','APP_LOCALE=pt'; " ^
  "$c=$c -replace '(?m)^APP_FALLBACK_LOCALE=.*','APP_FALLBACK_LOCALE=es'; " ^
  "$c=$c -replace '(?m)^DB_CONNECTION=.*','DB_CONNECTION=sqlite'; " ^
  "$c=$c -replace '(?m)^#?\s*DB_DATABASE=.*','DB_DATABASE=database/database.sqlite'; " ^
  "$c=$c -replace '(?m)^MAIL_MAILER=.*','MAIL_MAILER=log'; " ^
  "$c=$c -replace '(?m)^SESSION_DRIVER=.*','SESSION_DRIVER=file'; " ^
  "$c=$c -replace '(?m)^CACHE_STORE=.*','CACHE_STORE=file'; " ^
  "$c=$c -replace '(?m)^QUEUE_CONNECTION=.*','QUEUE_CONNECTION=sync'; " ^
  "Set-Content -Path $p -Value $c -NoNewline"

if not exist "database\database.sqlite" (
  type nul > "database\database.sqlite"
  echo [OK] database\database.sqlite cree
)

REM ---------- vendor ----------
if not exist "vendor\autoload.php" (
  echo.
  echo [..] composer install ...
  call %COMPOSER_CMD% install --no-interaction
  if errorlevel 1 (
    echo [ERREUR] composer install a echoue
    pause
    exit /b 1
  )
) else (
  echo [OK] vendor/ deja present
)

REM ---------- key ----------
findstr /B /C:"APP_KEY=base64:" .env >nul 2>&1
if errorlevel 1 (
  echo [..] generation APP_KEY ...
  "%PHP%" artisan key:generate --force
)

REM ---------- migrate + seed ----------
echo.
echo [..] migrations ...
"%PHP%" artisan migrate --force
if errorlevel 1 (
  echo [ERREUR] migrate a echoue
  pause
  exit /b 1
)

echo.
echo [..] seed catalogue (peut prendre 1-3 min) ...
"%PHP%" artisan db:seed --force
if errorlevel 1 (
  echo [WARN] seed a echoue - le site demarre quand meme sans produits
) else (
  echo [OK] catalogue seed
)

REM ---------- storage link ----------
if not exist "public\storage" (
  "%PHP%" artisan storage:link >nul 2>&1
)

REM ---------- npm optionnel ----------
where npm >nul 2>&1
if not errorlevel 1 (
  if not exist "node_modules\" (
    echo [..] npm install ...
    call npm install
  )
  if exist "node_modules\" (
    echo [..] npm run build ...
    call npm run build
  )
) else (
  echo [INFO] npm absent - OK, assets publics deja presents
)

echo.
echo ============================================
echo   Setup termine
echo   Demarrage: php artisan serve
echo   URL: http://127.0.0.1:8000
echo ============================================
echo.
echo Lancement du serveur... (CTRL+C pour arreter)
echo.
"%PHP%" artisan serve --host=127.0.0.1 --port=8000
pause
endlocal
