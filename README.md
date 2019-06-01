# Quiz Maker API

A PHP api for a quiz making application. Uses Slim Framework 3.0+. Placeholders of environment variables can be found in .env.example file in the project root directory.

    APP_URL= string, reserved for future implementation

    DISPLAY_ERRORS= boolean (1 or 0), Slim error reporting toggle
    COOKIES_HTTP_ONLY= boolean (1 or 0), toggles httpOnly flag on cookeis

    DB_DRIVER= string, the sql database to use (mysql, postgres, mssql...)
    DB_HOST= string, database server IP or localhost
    DB_NAME= string, database name
    DB_USERNAME= string, database username
    DB_PASSWORD= string, database password
