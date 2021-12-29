<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Library management
Library management system

<h2>Installation</h2>
<p>Clone the repository</p>
<pre> git clone https://github.com/tamalmcp/library_management </pre>

<p>Install all the dependencies using composer</p>
<pre> composer install </pre>

<p>Copy the example env file and make the required configuration changes in the .env file</p>
<pre> cp .env.example .env </pre>

<p>Run the database migrations (Set the database connection in .env before migrating)</p>
<pre> php artisan migrate </pre>

<h2>Database seeding</h2>
<p>Run the database seeder</p>
<pre> php artisan db:seed </pre>

<h2>Login info</h2>
<table>
    <thead>
        <tr>
            <th>Emil</th>
            <th align="left">Password</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>admin@gmail.com</td>
            <td align="left">123456</td>
        </tr>
    </tbody>
</table>

<h2>API</h2>
<pre>
    <table>
        <thead>
            <tr>
                <th>URL</th>
                <th>HTTP method</th>
                <th>form-data</th>
                <th>header-info</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>api/register</td>
                <td>POST</td>
                <td>name, email, password, confirm-password</td>
                <td></td>
            </tr>
            <tr>
                <td>api/login</td>
                <td>POST</td>
                <td>email, password</td>
                <td></td>
            </tr>
            <tr>
                <td>api/books</td>
                <td>GET</td>
                <td></td>
                <td>Authorization: Bearer 'login access token'</td>
            </tr>
            <tr>
                <td>api/book-store</td>
                <td>POST</td>
                <td>category_id, author_id, title, description</td>
                <td>Authorization: Bearer 'login access token'</td>
            </tr>
            <tr>
                <td>book-update/{book}</td>
                <td>POST</td>
                <td>category_id, author_id, title, description</td>
                <td>Authorization: Bearer 'login access token'</td>
            </tr>
            <tr>
                <td>book/{id}</td>
                <td>GET</td>
                <td></td>
                <td>Authorization: Bearer 'login access token'</td>
            </tr>
            <tr>
                <td>book/{id}</td>
                <td>DELETE</td>
                <td></td>
                <td>Authorization: Bearer 'login access token'</td>
            </tr>
        </tbody>
    </table>
</pre>

