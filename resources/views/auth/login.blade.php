<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>Login</title>
</head>
<body>
    <div class="login-background">
            <div class="guest-layout shadow p-3 bg-light rounded w-50">
                <div class="auth-session-status mb-4" id="session-status"></div>
                <form method="POST" action="/login">
                    <h2 class="text-center"><b>Welcome Back!</b></h2>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="email" name="email" />
                        <div class="input-error mt-2" id="email-error"></div>
                    </div>
                    <div class="mt-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                        <div class="input-error mt-2" id="password-error"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    <div class="">
                        <a class="underline text-secondary" href="/password/request">
                            Forgot your password?
                        </a>
                    </div>
                </div>
                <div class="d-flex m-2 justify-content-center">
                    <button type="submit" class="btn btn-success m-2">
                        Log in
                    </button>
                    <button type="submit" class="btn btn-outline-success m-2">
                        Sign up
                    </button>
                </div>

                </form>
            </div>

    </div>
</body>
</html>
