<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stoplight</title>

    <link rel="preconnect" href="https://unpkg.com">
    <link href="https://unpkg.com/@stoplight/elements/styles.min.css" rel="stylesheet">
</head>

<body>
    <elements-api apiDescriptionUrl="{{ asset('stoplight.yaml') }}" router="hash" />

    <script src="https://unpkg.com/@stoplight/elements/web-components.min.js"></script>
</body>
</html>
