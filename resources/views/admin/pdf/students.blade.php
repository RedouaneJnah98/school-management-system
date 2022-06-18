<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajiale School Students</title>
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
        font-size: 14px;
    }

    td {
        font-size: 12px;
    }

    table {
        border-collapse: collapse;
        caption-side: bottom;
    }

    caption {
        font-size: 16px;
        font-weight: bold;
        padding-top: 10px;
        text-transform: capitalize;
    }
</style>

<table>
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Phone Number</th>
        <th>Gender</th>
        <th>Date Of Join</th>
    </tr>
    </thead>
    <tbody>
    <!-- Item -->
    @foreach($students as $student)
        <tr>
            <td>{{ $student['firstname'] . ' ' . $student['lastname'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td>
                <span>{{ $student['phone'] }}</span>
            </td>
            <td>{{ $student['gender'] }}</td>
            <td>{{ $student['date_of_join'] }}</td>
        </tr>
    @endforeach
    <!-- End of Item -->
    </tbody>
    <caption>all ajiale school students for 2022.</caption>
</table>


</body>
</html>
