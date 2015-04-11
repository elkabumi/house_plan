<style>
<?php
$q_css_unit = mysql_query("select * from units");
$no_css_unit = 1;
while($r_css_unit = mysql_fetch_array($q_css_unit)){
?>
.responsive-calendar<?= $no_css_unit?> .controls {
  text-align: center;
  margin-top: 10px;
}
.responsive-calendar<?= $no_css_unit?> .controls a {
  cursor: pointer;
}
.responsive-calendar<?= $no_css_unit?> .controls h4 {
  display: inline;
}
.responsive-calendar<?= $no_css_unit?> .day-headers,
.responsive-calendar<?= $no_css_unit?> .days {
  font-size: 0;

}
.responsive-calendar<?= $no_css_unit?> .day {
  display: inline-block;
  position: relative;
  font-size: 14px;
  width: 14.285714285714286%;
  text-align: center;
  

}
.responsive-calendar<?= $no_css_unit?> .day a {
  color: #666;
  display: block;
  cursor: pointer;
  padding: 20% 0 20% 0;
  font-size:medium;

}
.responsive-calendar<?= $no_css_unit?> .day a:hover {
  background-color: #eee;
  text-decoration: none;
}
.responsive-calendar<?= $no_css_unit?> .day.header {
  border-bottom: 1px gray solid;
   font-weight: bold;
   padding-bottom:10px;
}
.responsive-calendar<?= $no_css_unit?> .day.active a {
  background-color: #F4543C;
  color: #ffffff;
}
.responsive-calendar<?= $no_css_unit?> .day.active a:hover {
  background-color: #BE0939;
}
.responsive-calendar<?= $no_css_unit?> .day.active .not-current {
  background-color: #8fcaef;
  color: #ffffff;
}
.responsive-calendar<?= $no_css_unit?> .day.active .not-current:hover {
  background-color: #bcdff5;
}
.responsive-calendar<?= $no_css_unit?> .day.not-current a {
  color: #ddd;
}
.responsive-calendar<?= $no_css_unit?> .day .badge {
  position: absolute;
  top: 2px;
  right: 2px;
  z-index: 1;
  background-color: #000;
}

.pull-left{
  margin-left:10px;
}
.pull-right{
  margin-right:10px;
}
<?php
$no_css_unit++;
}
?>
</style>