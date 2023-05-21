<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Thông tin vé</title>
    <style>
        body {
            background-color: #9d9898;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
        }

        .ticket {
            background-color: white;
            width: 350px;
            height: 480px;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
            margin-left: 10px;
            margin-right: 15px
        }

        .image-ticket {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="ticket">
     <div class="div-top" style="display: flex">
         <img class="image-ticket"
              src="https://moveek.com/bundles/ornweb/img/mascot.png"
              alt="hello">
         <div style="margin-left: 10px">
             <p style="color: deeppink">{{$dataDonHang->rap->tenRap}}</p>
             <p style="font-size: 11px; color: darkgrey">{{$dataDonHang->rap->diaChi}}</p>
             <p>{{$dataDonHang->tenPhim}}</p>
         </div>
     </div>

        <div class="div-bottom">
            <p style="color: darkgrey; margin-left: 10px">Thời gian: <span style="color: deeppink">{{$dataDonHang->suatChieu[0]->gioChieu}}</span> <span style="font-weight: bold; margin-left: 10px; color: black">{{$dataDonHang->suatChieu[0]->ngayChieu}}</span></p>
            <p style="margin-left: 10px"><strong>Phòng:</strong> {{$dataDonHang->suatChieu[0]->tenPhong}}</p>
            <p style="margin-left: 10px"><strong>Số vé:</strong> {{$dataDonHang->thongTinDonHang->soVe}}</p>
            <p style="margin-left: 10px"><strong>Số ghế:</strong> @php
                    $gheDisplayString = implode(', ', $dataDonHang->thongTinDonHang->veInfor->gheDisplay)
                @endphp
                {{$gheDisplayString}}</p>
        </div>
    </div>

</div>
</body>
</html>
