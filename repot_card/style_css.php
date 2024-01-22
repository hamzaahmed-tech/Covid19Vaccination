<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

*{
    padding: 0;
    margin: 0;
    list-style: none;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
:root{
    --primary_color: #106331;
    --border_table_color: #868686;
}
html{
    font-size: 62.5%;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: black;
    position: relative;
    
}
.report_container{
    width: 80rem;
    height: 50rem;
    border-radius: 1rem;
    text-transform: uppercase;
color:var(--primary_color);
user-select: none;

}
.report_top_section{
    width: inherit;
    height: 65%;
    background-color:#FEFAD5;
    border-radius: .5rem !important;
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}
.report_bottom_section{
    width: inherit;
    height: 35%;
    background-color:#ffffff;
    border-radius: .5rem !important;
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
}
.repot_top_head{
    display: flex;
    justify-content: space-between;
    padding: 2rem;
    font-size: 1.1rem;
}
.head_left h3{
border-bottom: .2rem solid var(--primary_color);
}
.mid_repot_content{
margin-top: 2rem;
padding: 2rem;
}
.pateint_img_and_detail{
display: flex;
align-items: center;

}
.mid_repot_content .repot_top_head {
    padding: 0;
    font-size: 1.3rem;
}
.mid_repot_content .repot_top_head  h3{
    border-bottom:   none;
}
.pateint_img_and_detail .pat_img{
    margin-top: 4rem;
    max-width: 9rem;
    max-height: 9rem;
    overflow: hidden;
}
.pat_img img{
width: 9rem;
height: 9rem;
aspect-ratio: 1/1;
object-fit: contain;

}
.pateint_detail{
    margin-left: 1rem;
    margin-top: -1rem;
    margin-top: 2rem;
}
.pateint_detail h3{
    border-bottom: .1rem solid var(--primary_color);
    font-weight: 500;
    color: #000;
}
.detail_row{
    display: flex;
    margin-top: 1rem;
}
.detail_row span{
    font-weight: 600;
}
.detaillright{
    margin-left: 1rem;
}
.report_bottom_section{
display: flex;
justify-content: flex-start;
align-items: center;
padding: 2rem;
}
.repot_table{
    width: 70%;
}
.repot_table thead,tbody{
    height: 3rem;
    text-align: center;
    font-size: 1rem;

}
.repot_bt{
    border-top: 1px solid var(--border_table_color);
}
.repot_bb{
    border-bottom: 1px solid var(--border_table_color);
}
.repot_bl{
    border-left: 1px solid var(--border_table_color);
}
.repot_br{
    border-right: 1px solid var(--border_table_color);
}
.report_nav{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    position: absolute;
    right: 2rem;
    top: 2rem;
}
.report_nav button{
    margin-left: 25px;
  background: #4154f1;
  color: #fff;
  border-radius: 4px;
  padding: 8px 25px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: 14px;
  display: inline-block;
  border: none;
  cursor: pointer;
}

</style>