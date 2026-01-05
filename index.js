$(document).ready(function(){
  var ct1=[];
  var ct2=[];
  let dateofexam;

  function ct2s1(){
     let dropdown = document.getElementById('ct21a');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s2(){
     let dropdown = document.getElementById('ct21b');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s3(){
     let dropdown = document.getElementById('ct21c');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  
  function ct2s4(){
     let dropdown = document.getElementById('ct21d');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s5(){
     let dropdown = document.getElementById('ct22a');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s6(){
     let dropdown = document.getElementById('ct22b');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s7(){
     let dropdown = document.getElementById('ct22c');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  
  function ct2s8(){
     let dropdown = document.getElementById('ct22d');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  
  function ct2s9(){
     let dropdown = document.getElementById('ct23a');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s10(){
     let dropdown = document.getElementById('ct23b');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s11(){
     let dropdown = document.getElementById('ct23c');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

  function ct2s12(){
     let dropdown = document.getElementById('ct23d');
     let options = [];
     let chosenItems = [];
     function setOptions(){
          for(var i = 0; i < dropdown.options.length; i++)
               options.push(dropdown.options[i].value);
     }
     // document.getElementById('autocreate').addEventListener("click", function(){
          options = options.filter( function( el ) {
               return chosenItems.indexOf( el ) < 0;
          });
          if(options.length == 0){
              //  console.log("reset data")
               setOptions();
               chosenItems = [];
          }
          var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
          for(var i = 0; i < dropdown.options.length; i++){
               var current = dropdown.options[i]
               if ( current.value == unSelectedRandom ) {
                    dropdown.selectedIndex = i;
                    chosenItems.push(current.value);
                    // console.log("chosen: "+chosenItems)
               }
          }
     // });
  }  

function cts2(){
   let dropdown = document.getElementById('ct11b');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts3(){
   let dropdown = document.getElementById('ct11c');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts4(){
   let dropdown = document.getElementById('ct11d');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts5(){
   let dropdown = document.getElementById('ct12a');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts6(){
   let dropdown = document.getElementById('ct12b');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts7(){
   let dropdown = document.getElementById('ct12c');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts8(){
   let dropdown = document.getElementById('ct12d');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}  

function cts1(){
   let dropdown = document.getElementById('ct11a');
   let options = [];
   let chosenItems = [];
   function setOptions(){
        for(var i = 0; i < dropdown.options.length; i++)
             options.push(dropdown.options[i].value);
   }
   // document.getElementById('autocreate').addEventListener("click", function(){
        options = options.filter( function( el ) {
             return chosenItems.indexOf( el ) < 0;
        });
        if(options.length == 0){
            //  console.log("reset data")
             setOptions();
             chosenItems = [];
        }
        var unSelectedRandom = options[Math.floor(Math.random() * options.length)]
        for(var i = 0; i < dropdown.options.length; i++){
             var current = dropdown.options[i]
             if ( current.value == unSelectedRandom ) {
                  dropdown.selectedIndex = i;
                  chosenItems.push(current.value);
                  // console.log("chosen: "+chosenItems)
             }
        }
   // });
}


  $('#autocreate').click(function(){
     var exam_type=$('#e').val();
     if(exam_type==="CT-1")
     {
 cts1();
 cts2();
 cts3();
 cts4();
 cts5();
 cts6();
 cts7();
 cts8();
 for(let i=0;i<=10;i++ )
 { 
   if($('#ct11b').val()==$('#ct11c').val())
   {
     cts2()
   }
   if($('#ct11c').val()==$('#ct11d').val())
   {
     cts3()
   }
   if($('#ct11d').val()==$('#ct11b').val())
   {
     cts4()
   }
   if($('#ct12b').val()==$('#ct12c').val())
   {
     cts6()
   }
   if($('#ct12c').val()==$('#ct12d').val())
   {
     cts7()
   }
   if($('#ct12d').val()==$('#ct12b').val())
   {
     cts8()
   }
}
}
else if(exam_type==="CT-2")
{
     ct2s1()
     ct2s2()
     ct2s3()
     ct2s4()
     ct2s5()
     ct2s6()
     ct2s7()
     ct2s8()
     ct2s9()
     ct2s10()
     ct2s11()
     ct2s12()
     for(let i=0;i<=15;i++ )
     { 
       if($('#ct21b').val()==$('#ct21c').val())
       {
         ct2s2()
       }
       if($('#ct21c').val()==$('#ct21d').val())
       {
         ct2s3()
       }
       if($('#ct21d').val()==$('#ct21b').val())
       {
         ct2s4()
       }
       if($('#ct22b').val()==$('#ct22c').val())
       {
         ct2s6()
       }
       if($('#ct22c').val()==$('#ct22d').val())
       {
         ct2s7()
       }
       if($('#ct22d').val()==$('#ct22b').val())
       {
         ct2s8()
       }
       if($('#ct23b').val()==$('#ct23c').val())
       {
         ct2s10()
       }
       if($('#ct23c').val()==$('#ct23d').val())
       {
         ct2s11()
       }
       if($('#ct23d').val()==$('#ct23b').val())
       {
         ct2s12()
       }
       
    }


}

else if(exam_type==="End Sem Exam")
{
     cts1();
     cts2();
     cts3();
     cts4();
     cts5();
     cts6();
     cts7();
     cts8();
     for(let i=0;i<=10;i++ )
     { 
       if($('#ct11b').val()==$('#ct11c').val())
       {
         cts2()
       }
       if($('#ct11c').val()==$('#ct11d').val())
       {
         cts3()
       }
       if($('#ct11d').val()==$('#ct11b').val())
       {
         cts4()
       }
       if($('#ct12b').val()==$('#ct12c').val())
       {
         cts6()
       }
       if($('#ct12c').val()==$('#ct12d').val())
       {
         cts7()
       }
       if($('#ct12d').val()==$('#ct12b').val())
       {
         cts8()
       }
    }

    ct2s1()
     ct2s2()
     ct2s3()
     ct2s4()
     ct2s5()
     ct2s6()
     ct2s7()
     ct2s8()
     ct2s9()
     ct2s10()
     ct2s11()
     ct2s12()
     for(let i=0;i<=15;i++ )
     { 
       if($('#ct21b').val()==$('#ct21c').val())
       {
         ct2s2()
       }
       if($('#ct21c').val()==$('#ct21d').val())
       {
         ct2s3()
       }
       if($('#ct21d').val()==$('#ct21b').val())
       {
         ct2s4()
       }
       if($('#ct22b').val()==$('#ct22c').val())
       {
         ct2s6()
       }
       if($('#ct22c').val()==$('#ct22d').val())
       {
         ct2s7()
       }
       if($('#ct22d').val()==$('#ct22b').val())
       {
         ct2s8()
       }
       if($('#ct23b').val()==$('#ct23c').val())
       {
         ct2s10()
       }
       if($('#ct23c').val()==$('#ct23d').val())
       {
         ct2s11()
       }
       if($('#ct23d').val()==$('#ct23b').val())
       {
         ct2s12()
       }
       
    }
}
  })
  
    $('#exam').click(function(){
      var t=  $("#exam option:selected").text();
      $('#e').val(t);
      if(t=="CT-1")
      {
        $('#maxtime').val("2 Hrs.");
        $('#maxmarks').val("40");
        $('#mt').val("2 Hrs.");
        $('#mm').val("40");
      }
      else if(t=="CT-2")
      {
        $('#maxtime').val("2 Hrs.");
        $('#maxmarks').val("60");
        $('#mt').val("2 Hrs.");
        $('#mm').val("60");
      }
      else if(t=="End Sem Exam")
      {
        $('#maxtime').val("3 Hrs.");
        $('#maxmarks').val("100");
        $('#mt').val("3 Hrs.");
        $('#mm').val("100");
      }
      else if(t=="Select")
      {
        $('#maxtime').val("--");
        $('#maxmarks').val("--");
      }
      
    })
          // Use change events; load subjects only on department change
          $('#sem').change(function(){
               var s=  $("#sem option:selected").text();
               $('#s').val(s);
          })
          $('#dept').change(function(){
      var d=  $("#dept option:selected").text();
      $('#d').val(d);
               $.post('sub.php',{dep:d},function(dta){
                    $('#sub').html(dta);
               })
    })
    $('#sub').change(function(){
      var subj=$("#sub option:selected").text();
      $('#su').val(subj);
    })
    $('#ques').click(function(){
    
        dateofexam=$('#dateofexam').val();
      
        var exam=  $("#exam option:selected").text();
        var semester=$("#sem option:selected").val();
        var subject=$("#sub option:selected").text();
        var dept=$("#dept option:selected").text();
        $.post('fetch_ques.php',{ex:exam,sem:semester,sub:subject,dep:dept},function(data){
                $('#q').html(data);
  
                $('#download').removeClass('d-none');
               
        })
    })

    $('#download').click(function(){
      $('#showdetail')[0].click();
      $('#homebtn').removeClass('d-none')
      var tab=$('#q').html();
      var sem=$('#s').val();
      var dept=$('#d').val();
      var subject=$('#su').val();
      var exam_type=$('#e').val();
      var mt=$('#mt').val();
      var mm=$('#mm').val();
      var printtab=$('#printtab').html();
      if(exam_type==="CT-1"){
       ct1[0]=$('#ct11a').val();
       ct1[1]=$('#ct11b').val();
       ct1[2]=$('#ct11c').val();
       ct1[3]=$('#ct11d').val();
       ct1[4]=$('#ct12a').val();
       ct1[5]=$('#ct12b').val();
       ct1[6]=$('#ct12c').val();
       ct1[7]=$('#ct12d').val();
        $.post('download.php',{dateofexam:dateofexam,sem:sem,dept:dept,subject:subject,exam_type:exam_type,mt:mt,mm:mm,ct1:ct1},function(data){
       $('#printtbl').html(data);
       let message=$('#message').html();
       let table = new DataTable('#ct1tbl');
       $('#ct1tbl').DataTable( {
         "bDestroy": true,
         "aoColumnDefs": [
          { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
          { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
      ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print', 
                title: "<center>Bhilai Institute of Technology, Durg</center>", 
                messageTop: message ,
                messageBottom:'<center>****000****</center>',
                class: "btn btn-success",
                titleAttr: 'Print ',
                text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/></svg>',
                init: function(api, node, config) {
                  $(node).removeClass('btn-default')
                }
            }
        ]
     } );
      })
    
      }

      else if(exam_type==="CT-2"){
          ct2[0]=$('#ct21a').val();
          ct2[1]=$('#ct21b').val();
          ct2[2]=$('#ct21c').val();
          ct2[3]=$('#ct21d').val();
          ct2[4]=$('#ct22a').val();
          ct2[5]=$('#ct22b').val();
          ct2[6]=$('#ct22c').val();
          ct2[7]=$('#ct22d').val();
          ct2[8]=$('#ct23a').val();
          ct2[9]=$('#ct23b').val();
          ct2[10]=$('#ct23c').val();
          ct2[11]=$('#ct23d').val();
        $.post('download.php',{dateofexam:dateofexam,sem:sem,dept:dept,subject:subject,exam_type:exam_type,mt:mt,mm:mm,ct2:ct2},function(data){
          $('#printtbl').html(data);
          let message=$('#message').html();
          let table = new DataTable('#ct2tbl');
          $('#ct2tbl').DataTable( {
            "bDestroy": true,
            "aoColumnDefs": [
             { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
             { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
         ],
           dom: 'Bfrtip',
           buttons: [
               {
                   extend: 'print',
                   title: "<center>Bhilai Institute of Technology, Durg</center>", 
                   messageTop: message ,
                   messageBottom:'<center>****000****</center>',
                   class: "btn btn-success",
            titleAttr: 'Print ',
            text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/></svg>',
            init: function(api, node, config) {
              $(node).removeClass('btn-default')
            }
               }
           ]
        } );
      })

      }

      else if(exam_type==="End Sem Exam"){
          ct1[0]=$('#ct11a').val();
       ct1[1]=$('#ct11b').val();
       ct1[2]=$('#ct11c').val();
       ct1[3]=$('#ct11d').val();
       ct1[4]=$('#ct12a').val();
       ct1[5]=$('#ct12b').val();
       ct1[6]=$('#ct12c').val();
       ct1[7]=$('#ct12d').val();
       ct2[0]=$('#ct21a').val();
          ct2[1]=$('#ct21b').val();
          ct2[2]=$('#ct21c').val();
          ct2[3]=$('#ct21d').val();
          ct2[4]=$('#ct22a').val();
          ct2[5]=$('#ct22b').val();
          ct2[6]=$('#ct22c').val();
          ct2[7]=$('#ct22d').val();
          ct2[8]=$('#ct23a').val();
          ct2[9]=$('#ct23b').val();
          ct2[10]=$('#ct23c').val();
          ct2[11]=$('#ct23d').val();
        $.post('download.php',{dateofexam:dateofexam,sem:sem,dept:dept,subject:subject,exam_type:exam_type,mt:mt,mm:mm,ct1:ct1,ct2:ct2},function(data){
          $('#printtbl').html(data);
          let message=$('#message').html();
          let table = new DataTable('#esetbl');
          $('#esetbl').DataTable( {
            "bDestroy": true,
            "aoColumnDefs": [
             { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
             { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
         ],
           dom: 'Bfrtip',
           buttons: [
               {
                   extend: 'print',
                   title: "<center>Bhilai Institute of Technology, Durg</center>", 
                   messageTop: message ,
                   messageBottom:'<center>****000****</center>',
                   class: "btn btn-success",
                   titleAttr: 'Print ',
                   text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/></svg>',
                   init: function(api, node, config) {
                     $(node).removeClass('btn-default')
                   }
               }
           ]
        } );
      })
    }
    })
  
//     $('body').on('change','#ct11a', function () {
//       ct1[0]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct11b', function () {
//       ct1[1]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct11c', function () {
//       ct1[2]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct11d', function () {
//       ct1[3]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct12a', function () {
//       ct1[4]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct12b', function () {
//       ct1[5]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct12c', function () {
//       ct1[6]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct12d', function () {
//       ct1[7]=$(this).find("option:selected").val();
//    });



//    $('body').on('change','#ct21a', function () {
//       ct2[0]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct21b', function () {
//       ct2[1]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct21c', function () {
//       ct2[2]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct21d', function () {
//       ct2[3]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct22a', function () {
//       ct2[4]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct22b', function () {
//       ct2[5]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct22c', function () {
//       ct2[6]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct22d', function () {
//       ct2[7]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct23a', function () {
//       ct2[8]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct23b', function () {
//       ct2[9]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct23c', function () {
//       ct2[10]=$(this).find("option:selected").val();
//    });
//    $('body').on('change','#ct23d', function () {
//       ct2[11]=$(this).find("option:selected").val();
//    });
})

