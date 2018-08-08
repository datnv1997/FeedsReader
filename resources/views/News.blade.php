<!DOCTYPE html>
<html>
<head>
    <title>Trang chu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token()}}"/>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    
</head>
<style>
			.gradient
            {
                background : linear-gradient(to bottom, #43CBFF, #9708CC);
                background : -moz-linear-gradient(to top, #43CBFF, #9708CC);
                background : -webkit-linear-gradient(to top,#43CBFF, #9708CC);
                background : -o-linear-gradient(to top,#43CBFF, #9708CC);
            }
            
</style>
<body>
<div class="container-fluid ">
   <div class="row" id="row">
        <div class="col-md-2  text-white text-center gradient  col-sm-2 col-12 ">
           <!-- <div class="col-md-2 text-white text-center"  style="background-image: url('../../img/gradient.jpg');"> -->
             <span  style="font-family:'SVN-Bellico';font-size:60px;">Utilities</span>
            <!-- <img src="../public/img/yasu.jpg" class="rounded-circle" alt="Dat Nguyen" style="height: 50%;width: 50%px"><br>-->
             <span  style="font-family:'SVN-Bellico';font-size:25px;">Welcome,</span><br>
             <span  style="font-family:'SVN-Bellico';font-size:25px;">Dat</span>
             
             <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link text-white active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">News</a>
              <a class="nav-link text-white" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Temperture</a>
              <a class="nav-link text-white" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ToDoList</a>
              <a class="nav-link text-white" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
            
            

        </div>

        <div class="col-md-10 text-center container-fluid pl-0 pr-0  col-sm-10 col-12">
                    
                <nav class    ="navbar navbar-light bg-light ">

                    <span style="font-family:'SVN-Bellico';font-size:60px;color:green">VnExpress</span>
                    <form class   ="form-inline">
                         <input class  ="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                         <button class ="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                     <!--bootstrap select-->
                    <div class    ="input-group mb-3">
                        <div class    ="input-group-prepend">
                            <label class  ="input-group-text" for="inputGroupSelect01">Category</label>
                        </div>
                        <select class ="custom-select" id="inputGroupSelect01" onchange="select_Category(this)">
                            <option value ="home"  selected="selected">Home</option>
                            <option value ="startup" id="startup" >startup</option>
                            <option value ="shooping" >Shopping</option>
                            
                        </select>
                    </div>
                </nav>
    
 
            <table class="table table-striped" id="table" >
                    <tr>
                            <th >STT</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Action</th>
                    </tr>
            @foreach($ReponsitoryHome as $item)

                <tr id="tr_data{{$item->id}}" class="tr">
                    <td >{{$item->id}}</td>
                    <td id="td_title{{$item->id}}">{{$item->title}}</td>
                    <td id="td_des{{$item->id}}">{!! $item->description !!}</td>
                    <td id="td_link{{$item->id}}"><a href="{{$item->link}}">See More</a></td>
                    <!--lấy giá trị của title,description,link-->
                    <input id ="title{{$item->id}}" value="{{$item->title}}" hidden> </input>
                    <input id ="des{{$item->id}}"   value="{{$item->description}}" hidden> </input>
                    <input id ="link{{$item->id}}"  value="{{$item->link}}" hidden> </input>
                    
            <!--các button activity-->
                    <td id="td_button{{$item->id}}">
                        <button  class="btn btn-danger" id="btn_del" value="{{$item->id}}" >Delete</button><br>
                        <button class="btn btn-primary" id="btn_edit" name="btn_edit" value="{{$item->id}}">Edit</button>
                    </td>
                </tr>
            @endforeach

            </table>
        <!--pagination-->
            <div class="pagination justify-content-center" id="pagination">
                         {!! $ReponsitoryHome->links() !!}
            </div>
        </div>
    </div>
</div> 
<!--Library-javascript-->
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
        $(document).ready(function()
        {

            $(".btn-danger").click(function () {
                var url="/feedsReader/public/del";
                var id_del = $(this).val();


                $.ajax({

                     //kiểu post
                        type    :"post",
                        url     : url+'/'+id_del ,
                        dataType:"json",
                        data    :
                        {
                        _token  : '{{csrf_token()}}',
                        },

                    success: function (html)
                    {

                        $("#tr_data"+id_del).remove();

                    },
                    error: function(){
                        alert("fail");
                    }


                })

            });
            //Edit
            $(".btn-primary").click(function ()
            {   
                //var url_send="/feedsReader/public/Edit";
                //var url_edit="/feedsReader/app/Reponsitories/Eloquent/abstractEloquentReponsitory.php";
                var id_edit=$(this).val();
               
                //lấy title
                var title_edit=$("#title"+id_edit).val();
                var text_title="<textarea name='title_area' form='form_ok' id='textarea"+id_edit+"'"+ " cols='40' rows='6'autofocus style='border-style:none' >"+title_edit+"</textarea>";

                $("#td_title"+id_edit).empty();
                $("#td_title"+id_edit).append( text_title);

               
                //lấy description
                var des_edit=$("#des"+id_edit).val();
                var text_description="<textarea name='des_area' form='form_ok' cols='70' rows='6' style='border-style:none' >"+des_edit+"</textarea>";
                $("#td_des"+id_edit).empty();
                $("#td_des"+id_edit).append(text_description);
                
                //lấy link
                var link_edit=$("#link"+id_edit).val();
                var text_link="<textarea name='link_area' form='form_ok' cols='20' rows='6' style='border-style:none'>"+link_edit+"</textarea>";
                $("#td_link"+id_edit).empty();
                $("#td_link"+id_edit).append(text_link);
                
                //add button ok
                var ok="<form id='form_ok' method='post' action='{{URL::Route('Action_Edit')}}'><input  value='"+id_edit+"'"+  "name='id_text' hidden ><input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'><button class='btn btn-dark' type='submit' value='"+id_edit+"'"+">"+"OK"+"</button></form>";

                
                $("#td_button"+id_edit).append(ok);


                    

            });

        });
        //chon category
        function select_Category(obj)
        {
                var url= "/feedsReader/public/startup";
                if(obj.value=='startup')
                {
                    $.ajax({
                        type: "get",
                        url: url,
                        dataType: "html",
                        data:
                            {
                                _token: '{{csrf_token()}}',
                            },
                        success: function (result) {
                            $('#row').html(result);
                            $('#startup').attr('selected', 'selected');
                            $(".btn-danger").click(function () {
                                var url="/feedsReader/public/startup_del";
                                var id_del = $(this).val();
                              $.ajax({

                                    //kiểu post
                                    type    :"post",
                                    url     : url+'/'+id_del ,
                                    dataType:"json",
                                    data    :
                                        {
                                            _token  : '{{csrf_token()}}',
                                        },

                                    success: function (html)
                                    {

                                        $("#tr_data"+id_del).remove();

                                    },
                                    error: function(){
                                        alert("fail");
                                    }


                                })

                            });



                        },
                        error: function () {
                            alert("fail");
                        }
                    })
                }
                    if(obj.value=='home')
                    {
                        $.ajax({
                            type    :"get",
                            url     : '/feedsReader/public/News' ,
                            dataType:"html",
                            data    :
                                {
                                    _token  : '{{csrf_token()}}',
                                },
                            success: function (result)
                            {
                                $('#row').html(result);
                                //$('#startup').attr('selected','selected');


                            },
                            error: function(){
                                alert("fail");
                            }



                        })


                }
        }

    </script>
</body>
</html>