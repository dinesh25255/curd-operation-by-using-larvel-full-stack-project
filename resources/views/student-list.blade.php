<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><student-list></student-list></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    


<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="response">
                <h1>student-list</h1>
                <div  style ="float: right;">
                    <a href="{{url('add-student')}}"  class ="btn btn-primary">Add student</a>
                </div>
                @if(Session::has('success'))
    <div class="alert alert-success"  role="alert">
        {{Session::get('success')}}
    </div>

    @endif
    

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>address</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                        $i = 1;

                        @endphp
                        @foreach ($data as $stu)
                        <tr>
    <td>{{$i++}}</td>
    <td>{{ $stu->name }}</td>
    <td>{{ $stu->email }}</td>
    <td>{{ $stu->phone }}</td>
    <td>{{ $stu->address}}</td>

    <td><a href="{{url('edit-student/'. $stu->id)}}"  class ="btn btn-primary">edit</a>
                

                <td><a href="{{url('delete-student/'. $stu->id)}}"  class ="btn btn-danger">delete</a>
                
</tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
