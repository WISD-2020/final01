<form action="/user/{{$user->id}}" method="POST" role="form">
    @method('PATCH')
    @csrf
<H1>修改會員資料</H1>

會員名稱：<br>
{{$user->name}}<br><br>

性別：<br>
    @if($user->sex == 1)
       男
    @else
       女
    @endif<br><br>

生日：<br>
{{$user->birthday}}<br><br>

電話：<br>
<input type="text" name="phone" value="{{$user->phone}}"><br><br>

電子郵件：<br>
    {{$user->email}} <br><br><br><br>

    <input type="button" name="submit" value="修改">

</form>



