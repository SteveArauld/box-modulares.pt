@echo off
setlocal
cd /d "%~dp0"
title box-modulares - serveur local

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
  echo PHP introuvable. Lance d abord setup-local.bat
  pause
  exit /b 1
)

if not exist "vendor\autoload.php" (
  echo vendor manquant. Lance d abord setup-local.bat
  pause
  exit /b 1
)

echo Serveur: http://127.0.0.1:8000
echo CTRL+C pour arreter
echo.
"%PHP%" artisan serve --host=127.0.0.1 --port=8000
pause
endlocal
