<form class="form-horizontal" method="post" action="">
    {{--                由于在Laravel框架中有此要求：

                    任何指向 web 中 POST, PUT 或 DELETE 路由的 HTML 表单请求都应该包含一个 CSRF 令牌(CSRF token)，否则，这个请求将会被拒绝。--}}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>

        <div class="col-sm-5">
            <input type="text" name="Student[name]" value="{{old('Student')['name'] ? old('Student')['name'] : (isset($student->name) ? $student->name:"") }}" class="form-control" id="name" placeholder="请输入学生姓名">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.name')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age"  class="col-sm-2 control-label">年龄</label>

        <div class="col-sm-5">
            <input type="text" name="Student[age]" value="{{old('Student')['age'] ? old('Student')['age'] : (isset($student->age) ? $student->age:"")}}" class="form-control" id="age" placeholder="请输入学生年龄">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.age')}}</p>
        </div>

    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">性别</label>

        <div class="col-sm-5" id="sex">
            <label class="radio-inline">
                <input type="radio" name="Student[sex]" {{isset($student->sex) && $student->sex == "未知" ? "checked ": ""}} value="未知">未知

            </label>
            <label class="radio-inline">
                <input type="radio" name="Student[sex]" {{isset($student->sex) && $student->sex == "男" ? "checked ": ""}} value="男">男

            </label>
            <label class="radio-inline">
                <input type="radio" name="Student[sex]" {{isset($student->sex) && $student->sex == "女" ? "checked ": ""}} value="女">女

            </label>
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.sex')}}</p>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btnn-primary">提交</button>
        </div>
    </div>
</form>