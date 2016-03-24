@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <iframe class="col-md-offset-3 col-md-6" width="100%" height="415" src="https://www.youtube.com/embed/m2giN8CS_Dk" frameborder="0" allowfullscreen></iframe>
</div>

<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="box">
                    <div class="box-content">
                        <h1 class="tag-title">Votre parrain</h1>
                        <hr />
                        
                        <br />
                        <a href="/parrain" class="btn btn-block btn-primary">Contacter mon parrain</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="box">
                    <div class="box-content">
                        <h1 class="tag-title">Discutez sur le forum</h1>
                        <hr />

                        <br />
                        <a href="/forum" class="btn btn-block btn-primary">Accéder au forum</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="box">
                    <div class="box-content">
                        <h1 class="tag-title">Regardez les vidéos
                        </h1>
                        <hr />
                        
                        <br />
                        <a href="/youtube" class="btn btn-block btn-primary">Regarder les vidéos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="box">
                    <div class="box-content">
                        <h1 class="tag-title">Ils peuvent vous aider</h1>
                        <hr />
                        
                        <br />
                        <a href="/entreprise" class="btn btn-block btn-primary">Ils peuvent vous aider</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="box">
                    <div class="box-content">
                        <h1 class="tag-title">Trouvez un emploi</h1>
                        <hr />
                       
                        <br />
                        <a href="#" class="btn btn-block btn-primary">Trouvez un emploi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="box">
                    <div class="box-content">
                        <h1 class="tag-title">Apprenez le français</h1>
                        <hr />
                       
                        <br />
                        <a href="#" class="btn btn-block btn-primary">Apprenez le français</a>
                    </div>
                </div>
            </div>

        </div>           
    </div>
</div>
</div>


@endsection