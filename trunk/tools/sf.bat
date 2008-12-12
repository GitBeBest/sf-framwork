@echo off

if "%OS%"=="Windows_NT" @setlocal

set SCRIPT_DIR=%~dp0

goto init

:init

if "%PHP_COMMAND%" == "" goto no_phpcommand

IF EXIST ".\sf" (
  %PHP_COMMAND% ".\tf" %1 %2 %3 %4 %5 %6 %7 %8 %9
) ELSE (
  %PHP_COMMAND% "%SCRIPT_DIR%tf" %1 %2 %3 %4 %5 %6 %7 %8 %9
)
goto cleanup

:no_phpcommand
rem echo ------------------------------------------------------------------------
rem echo WARNING: 请设置环境变量 PHP_COMMAND 指向 php.exe 文件
rem echo ------------------------------------------------------------------------
set PHP_COMMAND=php.exe
goto init

:cleanup
if "%OS%"=="Windows_NT" @endlocal
rem pause
