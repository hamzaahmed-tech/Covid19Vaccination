  <!-- pdf -->

  <script>
            window.jsPDF = window.jspdf.jsPDF;

            const htmlToPdf = ()=>{
              let doc = new jsPDF();
              let file = document.querySelector('#dowload_pdf');


              doc.html(file,{
                callback:function(doc){
                  doc.save('document-html.pdf')
                },
                margin:[10,10,10,10],
                autoPaging:'text',
                x:0,
                y:0,
                width:190,
                windowWidth:675
              })
            }


          </script>

