 $(document).ready(function() {

  $(".formulaire").submit(function (e) {

    e.preventDefault();
    var img = $('.upload').attr('src');

    var donnees = $('#content').val();
    $.ajax({
      url : '/Projet_Web_tweet_academie/tweet/inserthashtag', 
      type : 'POST',
      data : {message : donnees, file : img},
      success : function(reponse){
        console.log(reponse);
        reponse = JSON.parse(reponse);
        var img = '<a href="img"><img src="' + reponse.img + '"></a>';


if (reponse.img === "") {

          data = ""; 
          $(".cont1").before('<div class="cont row"><div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-lg-offset-4"><div class="box"><div class="box-icon"><span class="fa fa-4x fa-html5"></span></div><div class="info"><h4 class="text-center">' + reponse.pseudo + '</h4><p>' + reponse.message + '</p><p><i>' + reponse.date + ' </i></p><a href="#" class="btn">ReTweete</a></div></div></div>');         
        }

        else if(reponse.img !== "")

        {
          $(".cont1").before('<div class="cont row"><div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-lg-offset-4"><div class="box"><div class="box-icon"><span class="fa fa-4x fa-html5"></span></div><div class="info"><h4 class="text-center">' + reponse.pseudo + '</h4><p>' + reponse.message + '</p><img class="img" src="' + reponse.img + '"></a><p><i>' + reponse.date + '</i> </p><a href="#" class="btn">ReTweete</a></div></div></div>'); 
        }
      }
    });

  });

  $('.btn.retweet').click(function (e) {
    e.preventDefault();
      if (confirm("Voulez-vous retweeter ce tweet ?"))
      {
        var tab = [];
        var parent = e.target.parentNode;
        var pseudo = $(parent.childNodes[0]).text();
        for (var i = 0; i < parent.childNodes.length; i++)
        {
           if(parent.childNodes[i].nodeName === "IMG")
            {
              tab.image = parent.childNodes[i].src;
            }
            else if(parent.childNodes[i].nodeName === "H4")
            {
              tab.pseudo = $(parent.childNodes[i]).text();
            }
            else if(parent.childNodes[i].nodeName !== "BUTTON")
            {
              tab.push($(parent.childNodes[i]).text());
            }
        }
            $.ajax({
            url: "/Projet_Web_tweet_academie/tweet/Retweet",
            type: "POST",
            data: {data : tab, image : tab.image, pseudo : tab.pseudo},
            success: function(reponse) {

              var parse = JSON.parse(reponse);

            }
          });
        }

      });

  $('#retweet').submit(function (e) {
      e.preventDefault();
      console.log("lol");
  });
  function lime()
    {
      $('html').css({
        'background-color': "lime"
      });
    }
    function brown()
    {
      $('html').css({
        'background-color': "brown"
      });
    }
    function crimson()
    {
      $('html').css({
        'background-color': "crimson"
      });
    }
    function cyan()
    {
      $('html').css({
        'background-color': "cyan"
      });
    }
    function magenta()
    {
      $('html').css({
        'background-color': "magenta"
      });
    }
    function indigo()
    {
      $('html').css({
        'background-color': "indigo"
      });
    }
    function green()
    {
      $('html').css({
        'background-color': "green"
      });
    }
    function emerald()
    {
      $('html').css({
        'background-color': "emerald"
      });
    }
    function mauve()
    {
      $('html').css({
        'background-color': "mauve"
      });
    }
    function orange()
    {
      $('html').css({
        'background-color': "orange"
      });
    }
    function steel()
    {
      $('html').css({
        'background-color': "steel"
      });
    }
    function white()
    {
      $('html').css({
        'background-color': "#f5f8fa"
      });
    }
});