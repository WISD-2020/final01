<form action="/user/{{$user->id}}" method="POST" role="form">
    @method('PATCH')
    @csrf
<H1>修改會員資料</H1>

會員名稱：<br>
{{$user->name}}<br><br>

性別：<br>
    <select id="sex" name="sex" class="form-control">
        <option value="1" {{(!$user->sex)?'selected':''}}>男</option>
        <option value="0" {{($user->sex)?'selected':''}}>女</option>
    </select><br><br>

生日：<br>
<input type="date" name="birthday" value="{{$user->birthday}}"><br><br>

電話：<br>
<input type="text" name="phone" value="{{$user->phone}}"><br><br>

電子郵件：<br>
    <input type="text" name="email" value="{{$user->email}}"> <br><br><br><br>

    <input type="button" name="submit" value="修改">

</form>



