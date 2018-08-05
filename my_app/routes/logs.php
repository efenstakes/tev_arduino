<?php
  

  function logs(){
  	return array(

          array(
            'id'=> 1, 'temparature'=> 23, 'humidity'=> 34, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 180, 'garagedoor'=> 90,'fan'=> 0
            )
          ),
          array(
            'id'=> 2, 'temparature'=> 31, 'humidity'=> 4, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 1, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 90, 'garagedoor'=> 180,'fan'=> 0
            )
          ),
          array(
            'id'=> 3, 'temparature'=> 21, 'humidity'=> 3, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 1, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 180, 'garagedoor'=> 90,'fan'=> 0
            )
          ),
          array(
            'id'=> 4, 'temparature'=> 230, 'humidity'=> 114, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 1, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 90, 'garagedoor'=> 90,'fan'=> 0
            )
          ),
          array(
            'id'=> 5, 'temparature'=> 23, 'humidity'=> 34, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 0, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 90, 'garagedoor'=> 180,'fan'=> 1
            )
          ),
          array(
            'id'=> 6, 'temparature'=> 20, 'humidity'=> 30, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 1, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 180, 'garagedoor'=> 90,'fan'=> 1
            )
          ),
          array(
            'id'=> 7, 'temparature'=> 11, 'humidity'=> 1, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 0, 'led3'=> 0, 'led4'=> 0, 
            	'frontdoor'=> 180, 'garagedoor'=> 180,'fan'=> 0
            )
          ),
          array(
            'id'=> 8, 'temparature'=> 3, 'humidity'=> 4, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 1, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 90, 'garagedoor'=> 90, 'fan'=> 0
            )
          ),
          array(
            'id'=> 9, 'temparature'=> 99, 'humidity'=> 9, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 0, 'led3'=> 0, 'led4'=> 1, 
            	'frontdoor'=> 180, 'garagedoor'=> 180,'fan'=> 0
            )
          ),
          array(
            'id'=> 10, 'temparature'=> 90, 'humidity'=> 9, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 180, 'garagedoor'=> 90,'fan'=> 0
            )
          ),
          array(
            'id'=> 11, 'temparature'=> 13, 'humidity'=> 94, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 1, 'led3'=> 1, 'led4'=> 1, 
            	'frontdoor'=> 180, 'garagedoor'=> 180,'fan'=> 1
            )
          ),
          array(
            'id'=> 12, 'temparature'=> 23, 'humidity'=> 34, 
            'time'=> (new DateTime())->format('Y-m-d h:i:sa'),
            'otherstates'=> array(
            	'led1'=> 0, 'led2'=> 1, 'led3'=> 0, 'led4'=> 1, 
            	'frontdoor'=> 90, 'garagedoor'=> 90,'fan'=> 0
            )
          )

       );
  }


?>