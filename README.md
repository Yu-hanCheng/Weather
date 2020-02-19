# Current Weather
## Demo
![image](https://github.com/Yu-hanCheng/0218_interview/blob/master/demo.gif)
## Steps
1. `composer install`
2. 將 .env.example 改成 .env
    ＊ 修改資料庫連接
    ＊ 加上下面兩句
    ```
    WEATHER_API_URL=api.openweathermap.org/data/2.5/weather?q=
    APP_ID=bd45fc9db8849cb46d00a451483ccd44
    ```
    
3. `php artisan migrate`
4. `php artisan serve`
5. `http://localhost:8000/` 使用測試