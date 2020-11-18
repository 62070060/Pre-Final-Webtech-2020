<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>62070060</title>
</head>
<style>
    body{
        font-family: 'Kanit', sans-serif;
    }
</style>
<body>
    <div class="container mt-4">
    <form action="" method="POST">
        <label>ระบุคำค้นหา</label><br>
        <input class="custom-select w-75" type="text" name="number " id="sel">
        <button class="btn btn-primary">ค้นหา</button>
    </form>
        <div class="row" id="box"></div>
    </div>
    <script>
        let requestURL = 'ezquiz.json';
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) 
            {
                dataReportStatus(JSON.parse(request.responseText));
            }
        };
        request.open("GET", requestURL, true);
        request.send();
        function dataReportStatus(data) 
        {
            let Box = document.getElementById("box");
            let inner = "";
            for (let i = 0; i < data.tracks.items.length; i++) 
            {
                inner +=('<div class="col-md-4 mb-4"><div class="card p-0 w-100">')
                inner +=('<img class="card-img" src="'+ data.tracks.items[i].album.images[0].url +'">')
                inner +=('<h6 class="card-title">' + data.tracks.items[i].album.name + '</h6>' 
                + '<p class="card-text"> Artist : ' + data.tracks.items[i].artists[0].name 
                + '<p class="card-text"> Release date : ' + data.tracks.items[i].album.release_date 
                + '<p class="card-text"> Avaliable : ' + data.tracks.items[i].available_markets.length
                + '</p>')
  
                inner +=('</div></div></div>')
            }
            
            Box.innerHTML = inner;
        }
    </script>
</body>
</html>