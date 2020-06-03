<div class="div" style="position:absolute; top:55%; transform:translateY(-50%); padding:0px 75px;">
    <p style="text-align:center; font-size:22px;   margin-bottom:25px;"><u>TO WHOMSOEVER IT MAY CONCERN</u></p>
    <p style="text-align:justify; line-height:200%; font-size:20px;   margin-bottom:50px;">


        <span style="margin-left:50px;"></span>This is to certify that <span style="font-weight:bolder; text-transform:capitalize; ">{{$certificate->name}}</span> S/O,D/o:  <span style="font-weight:bolder; text-transform:capitalize; ">{{$certificate->father_name}}; Mother name: {{$certificate->mother_name}}; </span>is a bonafide student of our institute. He/She is studying in Class
        <span style="font-weight:bolder; text-transform:capitalize;">

            @if($certificate->class == 100)
            Pre Nursery-1
            @endif
            @if($certificate->class == 101)
            Nursery
            @endif
            @if($certificate->class == 102)
            L.K.G
            @endif
            @if($certificate->class == 103)
            U.K.G
            @endif
            @if($certificate->class < 100) <?php

                                            $a = $certificate->class;
                                            echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                            ?> @endif (Session:{{$certificate->session}})</span> vide Admission no. <span style="font-weight:bolder; text-transform:capitalize; ">{{$certificate->adm_no}}.</span> He/She bears a good moral character.









    </p>
    <p style="text-align:left; padding:60px 0px; font-size:20px; font-weight:bolder;">PRINCIPAL</p>
</div>