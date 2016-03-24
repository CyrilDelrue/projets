@extends('layouts.app')

@section('content')

<div class="background">
<img src="http://zupimages.net/up/16/10/3uxl.jpg">
</div>
<div class="content-wrapper">
    <section class="primary" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a data-toggle="modal" href="#myModal_3"><img class="lang" src="http://zupimages.net/up/16/10/6rgs.png"></a>
                </div>
                <div class="col-md-4 chat">
                    <a data-toggle="modal" href="#myModal_3"><img class="lang" src="http://zupimages.net/up/16/10/unds.png"></a>
                </div>
                <div class="col-md-4">
                    <a data-toggle="modal" href="#myModal_3"><img class="lang" src="http://zupimages.net/up/16/10/j2go.png"></a>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- 1ère img -->
<div class="container">
    <div class="row">
        <div id="myModal_1" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                        <h4 class="modal-title">Modal Heading</h4>
                    </div>
                    <div class="modal-body">
                        <!-- video -->
                        <iframe class="video" src="https://www.youtube.com/embed/m2giN8CS_Dk" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <a href="{{ url('/register')}} " class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> S'inscrire</a>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
    </div>
</div>
<!-- 2ème img -->
<div class="container">
    <div class="row">
        <div id="myModa_2" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                        <h4 class="modal-title">Modal Heading</h4>
                    </div>
                    <div class="modal-body">
                        <!-- video -->
                        <iframe class="video" src="https://www.youtube.com/embed/m2giN8CS_Dk" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <a href="{{ url('/register')}} " class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> S'inscrire</a>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
    </div>
</div>
<!-- 3ème img -->



<div class="container">
    <div class="row">
        <div id="myModal_3" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                        <h4 class="modal-title">Modal Heading</h4>
                    </div>
                    <div class="modal-body">
                        <!-- video -->
                        <iframe class="video" src="https://www.youtube.com/embed/m2giN8CS_Dk" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group" style="width:100%">
                            
                            <a href="{{ url('/register')}} " style="width:100%" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> S'inscrire</a>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
    </div>
</div>




@endsection