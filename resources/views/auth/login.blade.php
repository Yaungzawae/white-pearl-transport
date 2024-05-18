<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>
        <nav>
            <div class="navbar">
                    <img class="logo" src="/assets/logo.png"/>
                    <div class="language-container">
                        <div><a href="/">En</a></div>
                        <div><a href="/">Th</a></div>
                        <div><a href="/">Fr</a></div>
                    </div>
            </div>
        </nav>

        <div class="body-container">
            <!-- Put your code here -->

            <form class="form-wrapper" action="/login" method="POST">
                @csrf
                <h1>Login</h1>
                <select name="school">
                    <option selected="selected" disabled>Please Select Schools</option>
                    <option>School 1</option>
                    <option>School 2</option>
                    <option>School 3</option>
                </select>
                @error('school')
                <p class="error">{{ $message }}</p>
                @enderror


                <label for="username">User Name</label>
                <input name="username" id="username"/>
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror


                <label for="password">Password</label>
                <input name="password" id="password" type="password"/>
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror

                <button>Login</button>
                <a href="/">Don't have an account yet? Create one</a>

            </form>




            <!-- Put your code here -->
        </div>

    <div class="footer">
        <div class="contact-info">
            <img class="logo" src="/assets/logo.png"/>
            <div>
                <p>Contact Us: xxxxxxx xxxxxxx</p>
                <p>Hotline : xxxxx xxxxx</p>
                <p>Line: xxxxxxxx</p>
            </div>
        </div>
    </div>
</body>

</html>