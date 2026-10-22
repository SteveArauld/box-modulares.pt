@echo off
setlocal EnableExtensions
cd /d "%~dp0"
title box-modulares - install deps
echo Running install-deps.ps1 ...
powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0install-deps.ps1"
set ERR=%ERRORLEVEL%
echo.
echo Exit code: %ERR%
if exist "%~dp0INSTALL-REPORT.txt" (
  echo --- INSTALL-REPORT.txt ---
  type "%~dp0INSTALL-REPORT.txt"
)
echo.
echo If vendor is ready, start with: start-server.bat
echo Or: php artisan serve --host=127.0.0.1 --port=8000
exit /b %ERR%
