<p>This is the web Application I built with Laravel and Jquery while I was being interned in Active IT Zone. Using this application user can login, signup and create their CVs. Users will be able to download it as a pdf for which I used a 3rd party package. They can publish their CVs or save it as draft. The application also includes a realtime bidding app which uses jquery that makes a network call after a certain period of time defined by the developer.</p>



<h1 style="text-align: center;">Features :</h1>
<ul>
    <li>Login/SignUp with Social Media.</li>
    <li>Create CV.</li>
    <li>Admin can Download CV as pdf.</li>
    <li>Admin can create product that will be put into the Auction.</li>
    <li>Admin can create Auctions where users will be able to bid for a certain time provided by the admin.</li>
    <li>Additional Auction App.</li>
</ul>


<h1 style="text-align: center;">Usage :</h1>
<ul>
    <li>Download the repository</li>
    <li>Open terminal/cmd in the project root directory then run the command <b><code>composer update</code></b></li>
    <li>Change your database credentials in the .env file</li>
    <li>Create new database then import the sql file provided in the root directory 'cv.sql'</li>
    <li>Run <code>php artisan serve</code> for better experience as we did not move the index.php file from the public directory which shall be done in future.</li>
    <li>Finally Enjoy!</li>
</ul>

<h1 style="text-align: center;">Test Credentials :</h1>
<p>
    <b>Admin</b>
    <br>Username: admin@example.com
    <br>Password: helloman        
</p>
<p>
<br>
    <b>User</b>
    <br>Username: dummy@gmail.com
    <br>Password: helloman    
</p>
    
