<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('dashboard')}}">外送點餐系統</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            選單
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.cart')}}">購物車</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('order.history')}}">點餐紀錄</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.change')}}">修改會員資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.question')}}">問題回報</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.logout')}}">登出</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
