<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
  }

  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .header {
    text-align: center;
  }

  .content {
    margin-top: 20px;
  }

  p {
    font-size: 16px;
    line-height: 1.6;
  }
  .success-button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .success-button:hover {
            background-color: #45a049;
        }
</style>
</head>
<body>
  <div class="container">
    <div class="header">
        <h1>KHÁCH SẠN K-HOTEL</h1>
    </div>
    <div class="content">
      <p>Xin chào, {{ $booking->customer->name }}</p>
      <p>Bạn vừa đặt phòng thành công !</p>
      <a href="#" class="success-button">Xem chi tiết</a>
    </div>
  </div>
</body>
</html>
