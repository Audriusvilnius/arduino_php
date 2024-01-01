## NodeMCU data read and writhe
Requirements:
* [PHP 8.2](https://www.php.net/)
* [MySQL](https://www.mysql.com/) / [XAMPP] (https://www.apachefriends.org/download.html)
Setup:
1. Run web server:
   * With XAMPP (cd code/` from ../xampp/htdocs`)
   * Start code from repo:
     * `https://github.com/Audriusvilnius/Two-Factor-Authentication`
2. Data writhe to DB Example:
   * `http://localhost/arduino_php/getSecureStatus.php/?value=2&id=3`
4. Data read from DB Example:
   * `http://localhost/arduino_php/getSecureData.php`
