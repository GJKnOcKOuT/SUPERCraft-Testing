<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see https://repo.art-er.it Developers' community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */


/* 
This datasource returns a response in the form of a google query response

USAGE
All parameters are optional
datasource.php?xmin=0&xmax=314&xstepnum=25&ymin=0&ymax=314&ystepnum=25

DOCUMENTATION
http://code.google.com/apis/visualization/documentation/dev/implementing_data_source.html


EXAMPLE OF A RESPONSE FILE

Note that the reqId in the response must correspond with the reqId from the 
request.
________________________________________________________________________________

google.visualization.Query.setResponse({
  version:'0.6',
  reqId:'0',
  status:'ok',
  table:{
    cols:[
      {id:'x',
       label:'x',
       type:'number'},
      {id:'y',
       label:'y',
       type:'number'},
      {id:'value',
       label:'value',
       type:'number'}
    ],
    rows:[
      {c:[{v:0}, {v:0}, {v:10.0}]},
      {c:[{v:1}, {v:0}, {v:12.0}]},
      {c:[{v:2}, {v:0}, {v:13.0}]},
      {c:[{v:0}, {v:1}, {v:11.0}]},
      {c:[{v:1}, {v:1}, {v:14.0}]},
      {c:[{v:2}, {v:1}, {v:11.0}]}
    ]
  }
});
________________________________________________________________________________

*/


/**
 * A custom function
 */ 
function custom($x, $y) {
  $d = sqrt(pow($x/100, 2) + pow($y/100, 2));
  
  return 50 * exp(-5 * $d / 10) * sin($d*5);
}




// retrieve parameters
$default_stepnum = 25;

$xmin     = isset($_REQUEST['xmin'])     ? (float)$_REQUEST['xmin']   : -100;
$xmax     = isset($_REQUEST['xmax'])     ? (float)$_REQUEST['xmax']   : 100;
$xstepnum = isset($_REQUEST['xstepnum']) ? (int)$_REQUEST['xstepnum'] : $default_stepnum;

$ymin     = isset($_REQUEST['ymin'])     ? (float)$_REQUEST['ymin']   : -100;
$ymax     = isset($_REQUEST['ymax'])     ? (float)$_REQUEST['ymax']   : 100;
$ystepnum = isset($_REQUEST['ystepnum']) ? (int)$_REQUEST['ystepnum'] : $default_stepnum;

// in the reply we must fill in the request id that came with the request
$reqId = getReqId();

// check for a maximum number of datapoints (for safety)
if ($xstepnum * $ystepnum > 10000) {
  echo "google.visualization.Query.setResponse({
    version:'0.6',
    reqId:'$reqId',
    status:'error',
    errors:[{reason:'not_supported', message:'Maximum number of datapoints exceeded'}]
  });";

  exit;
}


// output the header part of the response
echo "google.visualization.Query.setResponse({
  version:'0.6',
  reqId:'$reqId',
  status:'ok',
  table:{
    cols:[
      {id:'x',
       label:'x',
       type:'number'},
      {id:'y',
       label:'y',
       type:'number'},
      {id:'value',
       label:'',
       type:'number'}
    ],
    rows:[";

// output the actual values
$first = true;
$xstep = ($xmax - $xmin) / $xstepnum;
$ystep = ($ymax - $ymin) / $ystepnum;
for ($x = $xmin; $x < $xmax; $x+=$xstep) {
  for ($y = $ymin; $y < $ymax; $y+=$ystep) {
    $value = custom($x,$y);
    
    if (!$first) {
      echo ",\n";
    } 
    else {
      echo "\n";
    }
    echo "      {c:[{v:$x}, {v:$y}, {v:$value}]}";
    
    $first = false;
  }
}


// output the end part of the response
echo "      
    ]
  }
});
";


/**
 * Retrieve the request id from the get/post data
 * @return {number} $reqId       The request id, or 0 if not found
 */ 
function getReqId() {
  $reqId = 0;

  foreach ($_REQUEST as $req) {
    if (substr($req, 0,6) == "reqId:") {
      $reqId = substr($req, 6);
    }
  }

  return $reqId;
}


?>
