<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banking</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="register.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center text-uppercase">
            <h1>Register User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger" role="alert"></div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                       placeholder="Password">
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName"
                       placeholder="lastName">
            </div>
            <div class="form-group">
                <label for="fatherName">Father Name</label>
                <input type="text" class="form-control" name="fatherName" id="fatherName"
                       placeholder="fatherName">
            </div>
            <div class="form-group">
                <label for="socialNumber">Social Number</label>
                <input type="number" class="form-control" name="socialNumber" id="socialNumber"
                       placeholder="socialNumber">
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="text" class="form-control" name="birthDate" id="birthDate" placeholder="socialNumber">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address"
                       placeholder="address">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone"
                       placeholder="phone">
            </div>
            <div class="form-group">
                <label for="idAddress">Id Address</label>
                <input type="text" class="form-control" name="idAddress" id="idAddress"
                       placeholder="idAddress">
            </div>
            <div class="form-group">
                <label for="idNumber">Id Number</label>
                <input type="text" class="form-control" name="idNumber" id="idNumber"
                       placeholder="idNumber">
            </div>
            <div class="form-group">
                <label for="idExpiryDate">Id Expiry Date</label>
                <input type="text" class="form-control" name="idExpiryDate" id="idExpiryDate"
                       placeholder="idExpiryDate">
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" name="company" id="company"
                       placeholder="company">
            </div>
            <div class="form-group">
                <label for="isResident">Resident</label>
                <select id="isResident">
                    <option value=""></option>
                    <option value="1"> Yes</option>
                    <option value="0"> No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="employed">Employed</label>
                <select id="employed">
                    <option value=""></option>
                    <option value="1"> Yes</option>
                    <option value="0"> No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="promotions">Promotions</label>
                <select id="promotions">
                    <option value=""></option>
                    <option value="1"> Yes</option>
                    <option value="0"> No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nationality_id">Nationality</label>
                <select id="nationality_id">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="branch_id">Branch</label>
                <select id="branch_id">
                    <option value=""></option>
                </select>
            </div>
            <button type="submit" id="register" class="btn btn-default">Register</button>
        </div>
    </div>
</div>
</body>
</html>