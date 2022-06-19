<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajiale School Teachers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<style>
    body {
        font-family: 'Heebo', sans-serif;
        font-size: 16px;
    }

    table, th, td {
        border: solid 1px #0a0a0a;
        padding: 10px;
    }

    th {
        font-size: 11px;
    }

    td {
        font-size: 10px;
    }

    table {
        border-collapse: collapse;
        caption-side: bottom;
    }

    caption {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 1.5rem;
        text-transform: capitalize;
    }

    p {
        font-size: 14px;
        text-align: right;
        margin-bottom: 3rem;
    }
</style>

<p>{{ date('F j, Y, g:i a') }}</p>

<table>
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>City</th>
        <th>Date Of Birth</th>
    </tr>
    </thead>
    <tbody>
    <!-- Item -->
    @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher['firstname'] . ' ' . $teacher['lastname'] }}</td>
            <td>{{ $teacher['email'] }}</td>
            <td>
                <span>{{ $teacher['phone'] }}</span>
            </td>
            <td>{{ $teacher['address'] }}</td>
            <td>{{ $teacher['city'] }}</td>
            <td>{{ $teacher['dob'] }}</td>
        </tr>
    @endforeach
    <!-- End of Item -->
    </tbody>
    <caption>Ajiale School Teachers.</caption>
</table>
</body>
</html>
