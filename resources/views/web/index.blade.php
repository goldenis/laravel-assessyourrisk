@extends('web.layouts.main')

@section('content')

    <!-- OVERLAYS -->
<script>
  sessionStorage.clear();

</script>
<!-- 30/10/2015 07:20 PM -->


    <div class="overlay progress-overlay">
        <div class="question-stats">
        </div>
        <button class="sub close-btn">✕</button>
        <div class="share in2">
            <div class="share-copy">
                <h5>Save the life of somebody you love. Tell them to complete this experience too.</h5>
            </div>
            <div class="share-btn-wrapper">
                <span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a data-subject="{{$share_result_overlay->subject}}" data-body="{{$share_result_overlay->body}}" id="create-modal3" href="#" target="_blank" class="mail-icon create-modal"><i class="fa fa-envelope fa-lg"></i></a>SHARE</span>
            </div>
        </div>


        <div class="results" style="display: block;">
            <div class="your-risk">
                <h2>Your Baseline Risk is <span class="risk-level"></span></h2>
            </div>


            <div class="paragraph-wrapper">
                <div class="paragraph-box">

                    <!-- Average -->
                    <div class="results-copy-average on">
                        <!-- paragraph-one (left) -->
                        <div class="column">
                            <div class="col-izq-1"></div>
                            <div class="col-izq-2 more-results"></div>

                        </div>
                        <!-- paragraph-two (right) -->
                        <div class="column">
                            <div class="col-der-1"></div>
                            <div class="col-der-2 more-results"></div>

                            <div class="read-more-box">
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Pink Email/PDF/Doctor Footer on first card -->
                <div class="email-pdf-doctor">
                    <!-- <div class="email-pdf"><a href='mailto:?subject=Here are the results of my risk assessment&amp;body=I thought you might find this information interesting' target="_blank">Email to your Doctor</a> -->
                    <div class="email-pdf-copy">
                        <h4>Would you like a copy of your results?</h4>
                    </div>
                    <div class="email-pdf-btns">
                        <button class="sub email">EMAIL</button><a id="pdf-btn" href="{{URL::to('pdf/report/')}}/" target="_blank" class="pdf"><button class="pdf">PDF</button></a><button class="sub email-doctor">SHARE WITH MY DOCTOR</button>
                    </div>
                    <div class="email-fields-doctor">
                        <h4>Share results with my doctor.</h4>
                        <input type="text" placeholder="Your Full Name" id="your-name-dr" required="">
                        <input type="text" placeholder="Doctor's email address" id="dr-email-address" required=""><button class="sub send-dr-email">SEND</button> <button class="sub cancel">Cancel</button>

                    </div>
                    <div class="email-fields-user">
                        <h4>Share my results with me.</h4>
                        <input type="text" placeholder="Your Full Name" id="your-name" required="">
                        <input type="text" placeholder="My email address" id="user-email-address" required=""><button class="sub send-user-email">SEND</button><button class="sub cancel">Cancel</button>
                    </div>
                </div>
                <!-- paragraph wrapper close -->
            </div>
        </div>

        <!-- End of Results div -->

        <div class="cards" style="display: block;">

            <div class="card-intro-text">
                <h3>Life Affects Your Life: Understanding Your Other Risk Factors</h3><br><br>
                <p>Your baseline risk above is your starting point.
                    The lifestyle and personal health history factors below can potentially increase or decrease that baseline risk.
                    Talk to your doctor about how these risk factors may be affecting your total risk—make it a goal to get or keep as much as you can working in your favor.
                </p>

            </div>

            <br>

            <!-- Positivo -->
            <div class="card positive">
                <div class="factors-title"><h3>Working In Your Favor</h3></div>



                @foreach($favors as $favor)

                    {{--@if(in_array($favor->question_opcion_id,$answers_array->toArray(),true))--}}

                    {{-- <span class="level">--}}
                    <div class="item item-{{$favor->question_opcion_id}}">
                        <div class="section-title">{{$favor->subtitle}}</div>
                        <h4>{{$favor->title}}</h4>
                        {!!$favor->content!!}
                    </div>
                    {{--  </span>--}}
                    {{--@endif--}}

                @endforeach







            </div>

            <!-- Negative -->
            <div class="card negative">  <div class="factors-title"><h3>Not Working in Your Favor</h3></div>

                @foreach($no_favors as $no_favor)
                    {{--@if(in_array($no_favor->question_opcion_id,$answers_array->toArray(),true))--}}

                    {{-- <span class="level">--}}
                    <div class="item item-{{$no_favor->question_opcion_id}}">
                        <div class="section-title">{{$no_favor->subtitle}}</div>
                        <h4>{{$no_favor->title}}</h4>
                        {!!$no_favor->content!!}
                    </div>
                    {{--  </span>--}}
                    {{--@endif--}}
                @endforeach

            </div>
        </div>

    </div>

    <div class="overlay menu-overlay">
        <button class="sub close-btn">✕</button>
        <div class="vignettes">
            <!-- <div class="progress">
              <div class="percentage percdive"></div>
              <div class="chart chart-5"></div>
            </div> -->
            <div class="sections">
                <h3>Lifestyle</h3><br>
                <h3>Your Normal</h3><br>
                <h3>Family & Health History</h3>
            </div>
        </div>
        <div class="share">
            <div class="share-copy">
                <h5>Save - the life of somebody you love. Tell them to complete this experience too.</h5>
            </div>
            <div class="share-btn-wrapper">
                <button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><img src="img/twitter.png"></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><img src="img/facebook.png"></a><a href="#" id="create-modal" target="_blank" class="mail-icon"><img src="img/mail.png"></a>SHARE</button>
            </div>
        </div>
    </div>


    <div class="overlay male-overlay">
        <button class="sub close-btn">✕</button>
        <h1>Then <span class="share-btn">share<a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess your personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a href="#" id="create-modal3" target="_blank" class="create-modal mail-icon" data-subject="{{$share->subject}}" data-body="{{$share->body}}"><i class="fa fa-envelope fa-lg"></i></a></span> this with someone you care about that does. You just might save her life.</h1>
    </div>

    <div class="fact-overlay">
        <button class="sub close-btn">✕</button>
        <div class="return">
            <div class="arrow"><img src="{{asset('img/arrow_left.png')}}"></div>
            <h4>Return to Assessment</h4></div>





        <div class="assessment-facts">
            @foreach($questions as $question)
                <div class="facts-mobil">
                    {!! $question->text_colum !!}
                </div>
            @endforeach
        </div>

    </div>







    <!-- INTRO CON RUEDA -->


    <section class="intro" class="flex-container vertical-container">

        <div class="wheel-container">
            <!--[if lt IE 10]>
            <img src="img/wheel_fallback.jpg">
            <![endif]-->
            <div id="wheel-base"><!-- <div class="spin">CLICK TO SPIN</div> --></div>
            <div id="wheel-overlay"></div>
        </div>
        <div class="intro-message">
            {!!$intro->text!!}
            <button class="action lifestyle"> {{$intro->button}}</button>

        </div>
    </section>












    <!-- ASSESSMENT QUESTIONS -->
    <section class="assessment scrollpane">
        <!-- <div class="section-title">Assess Your Risk</div> -->
		<div class="assessment-divider"></div>
        <div class="assessment-dots dots">
            <div class="btn-back"><img src="{{asset('img/arrow_left_pink.png')}}"></div>
            <div class="fact-icon"> i </div>
        </div>

        <!-- ASSESSMEN intro   -->
        <section class="assessment-intro">

            {!! $assessment_intro->text !!}

            <button class="action quiz-start">{{ $assessment_intro->button  }}</button>
            <div class="copyright copyright-mobile">Copyright © {{$year}} Bright Pink
                <div class="legal">
                    <a href="http://www.brightpink.org/privacy-policy/" target="_blank">Privacy Policy</a>
                    <a href="http://www.brightpink.org/disclaimer/" target="_bank">Terms and Conditions</a>
                </div>
            </div>
        </section>


        <div class="assessment-wrap">



            @foreach($questions as $question)
                {!!Form::hidden('question_id',$question->id,['id'=>'question_id'])!!}

{{--RADIO BOTON--}}

                @if($question->question_type_id==1)

                    {{--{{dd($question)}}--}}

                    <div class="question out @if($question->gif != '' || $question->gif != null) gif @endif" data-question-id="{{$question->id}}">
                        @if($question->gif != '' || $question->gif != null)
                            <div class="anim-gif @if ($question->slug == 'birth_control') birth @else calendar @endif">
                                <img src="{{asset('img/')}}/{!!$question->gif!!}">
                            </div>
                        @endif
                        <div class="prompt">{!!$question->text!!}</div>

                        <div class="answers-list" data-question-id2="{{$question->id}}">
                            <div class="checkbox-list" data-question-id2="{{$question->id}}">
                                <form>
                                    @foreach($question->questionOption as $option)
                                        <div class="checkbox ch-radio @if($question->column2 == 1) column-2 @endif @if($question->column2_mobil == 0) column-2-not @endif">
                                            <input type="radio" name="radio" data-question-id="{{$question->id}}" data-option-id="{{$option->id}}" data-option-value="{{$option->value}}">
                                            <div class="label">{!! $option->text !!}</div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                            <br>
                            <div class="answers">
                                <button class="radio_button" disabled>{{$question->button_text}}</button>
                                @if($question->email==1)
                                    <button class="create-modal sub ask" data-subject="{{$question->email_subject}}" data-body="{{$question->email_body}}">Help me ask them</button>
                                @endif
                            </div>
                        </div>

                    </div>

                @elseif($question->question_type_id==2)
{{--CHECK BOX--}}


                    <div class="question out"  data-question-id="{{$question->id}}">
                        @if($question->gif != '' || $question->gif != null)
                            <div class="anim-gif @if ($question->slug == 'have_you_ever_given_birth') birth @else calendar @endif">
                                <img src="{{asset('img/')}}/{!!$question->gif!!}">
                            </div>
                        @endif
                        <div class="prompt">{!!$question->text!!}</div>

                        <div class="checkbox-list " data-question-id2="{{$question->id}}">

<?php $i = 0; ?>
                            @if($question->column2 == 1) <!--para dos columnas-->

                                <?php $i=0; $data=[];?>
                                @foreach($question->questionOption as $option)
                                        <?php
                                            $data[$i]= ["option"=>$option->id,'unique'=>$option->unique, 'question' => $question->id, 'text'=>$option->text, 'value'=>$option->value ];
                                            $i++;
                                        ?>
                                @endforeach

                                <?php
                                 $n = count($data);
                                 $col1 = ceil($n/2);
                                 $col2 = $n-$col1;
                                ?>

                                <div class="column-2css">
                                    @for($x=0; $x < $col1; $x++ )

                                        <div class="checkbox" data-answer-id="1">
                                            <input name="check" type="checkbox" @if($data[$x]['option']==1) class="none-of-above" @endif data-question-id="{{$data[$x]['question']}}" data-option-id="{{$data[$x]['option']}}" data-option-value="{{$data[$x]['value']}}">
                                            <div class="label">{!!$data[$x]['text']!!}</div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="column-2css">
                                    @for($x=$col1; $x < $n; $x++ )
                                        <div class="checkbox" data-answer-id="1">
                                            <input name="check" type="checkbox" @if($data[$x]['option']==1) class="none-of-above" @endif data-question-id="{{$data[$x]['question']}}" data-option-id="{{$data[$x]['option']}}" data-option-value="{{$data[$x]['value']}}">
                                            <div class="label">{!!$data[$x]['text']!!}</div>
                                        </div>
                                    @endfor
                                </div>

                            @else <!-- para una columna  -->

                                @foreach($question->questionOption as $option)

                                    <div class="checkbox @if($question->column2 == 1) column-2-checkbox @endif @if($question->column2_mobil == 0) column-2-not-checkbox @endif" data-answer-id="1">
                                        <input name="check" type="checkbox" @if($option->unique==1) class="none-of-above" @endif data-question-id="{{$question->id}}" data-option-id="{{$option->id}}" data-option-value="{{$option->value}}">
                                        <div class="label">{!!$option->text!!}</div>
                                    </div>

                                    <?php
                                        $data[$i]= ["option"=>$option->id,'unique'=>$option->unique, 'question' => $question->id, 'text'=>$option->text, 'value'=>$option->value ];
                                        $i++;
                                    ?>

                                @endforeach
                            @endif

                        </div>
                        <br>
                        <div class="answers">
                            <button class="check_box" disabled data-question-id="{{$question->id}}">{{$question->button_text}}</button>
                            @if($question->email==1)
                                <button class="create-modal sub ask" data-subject="{{$question->email_subject}}" data-body="{{$question->email_body}}">Help me ask them</button>
                            @endif
                        </div>
                    </div>

                @elseif($question->question_type_id==3)
{{--BOTON--}}


                    <div class="question @if($question->gif != '' || $question->gif != null) gif @endif out" data-question-id="{{$question->id}}">

                        @if($question->gif != '' || $question->gif != null)
                            <div class="anim-gif @if ($question->slug == 'have_you_ever_given_birth') birth @else calendar @endif">
                                <img src="{{asset('img/')}}/{!!$question->gif!!}">
                            </div>
                        @endif

                        <div class="prompt">{!! $question->text !!}</div>

                        <div class="answers button">
                            @foreach($question->questionOption as $option)
                                <button class="button_type" data-option-id="{{$option->id}}" data-option-value="{{$option->value}}">{{$option->button_text}}</button>
                            @endforeach
                            @if($question->email==1)
                                <button class="create-modal sub ask" data-subject="{{$question->email_subject}}" data-body="{{$question->email_body}}">Help me ask them</button>



                            @endif
                        </div>
                    </div>




                @elseif($question->question_type_id==4)
                    {{--ESPECIAL--}}

                    @if($question->id == 33) {{--bottle--}}

                    <div class="question drinks-question out"  data-question-id="{{$question->id}}">
                        <div class="prompt">{!!$question->text!!}</div>
                        <div class="drink-slider">
                            <div class="bottle"><img src="{{asset('img/assessment/bottle.png')}}"></div>
                            <div class="answers drinks">
                                <div class="drink" data-answer-id="1"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="2"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="3"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="4"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="5"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="6"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="7"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <br><br><br>
                                <button class="btn-bottle" data-question-id="{{$question->id}}">Continue</button>
                            </div>
                        </div>
                    </div>

                    @elseif($question->id == 34) {{--weight--}}
                    <div class="question weight-question" data-question-id="34">
                        <div class="weight-wrapper">
                            <div class="prompt weight-header">What is your weight?
                            <span>Your answer will only be used to calculate your BMI, which can affect your risk.</span>
							</div>
                            <div class="visual">
                                <div class="weight-container-mask">
                                    <div class="weight-container">
                                        <div id="weight-base"></div>
                                        <div id="weight-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="answers weight-answer">
                                <button class="submit-weight">Continue</button>
                            </div>
                        </div>
                        <br>
                    </div>

                    @elseif($question->id == 49) {{--height  // este es solo para local  --}}
                    {{-- @elseif($question->id == 49) --}}{{--height--  // este es para producción--}}

                    <div class="question height-question" id="height-question" data-question-id="{{$question->id}}" data-question-name="bmi">
                        <div class="bmi-result">
                            <div class="answers">
                                <button id="btn-bmi">Continue</button>
                            </div>
                        </div>

                        <div class="height-wrapper">
                            <div class="prompt height-header">What is your height?</div>
                            <div class="visual">
                                <div class="height-container-mask">
                                    <div class="height-container">
                                        <div id="height-base"></div>
                                        <div id="height-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-calculate">Calculate</button>
                        </div>


                        <br>


                    </div>
                    @endif

                @endif

            @endforeach

            <div class="share result">
                <button class="my-results">VIEW YOUR RESULTS</button><br><br>



                <!-- ecuando se le hace click a cualquier boton va a rremplazar el value tanto del subjet como del body,
                actualmente tiene caergado el de educacion por que ese boton share es cargado por medio de ajax y no se pudo cargar
                de otra  manera cuando se hace click el botn de share de educacion se va a ver este contenido, pero cuando se abra
                 cualquier optro se va a reemplazar por el attributo data-subject o data-body de cada boton-->
                <div id="dialog-form" title="Share">
                    <form>
                        <table class="modal-table">
                            <tr>
                                <td><label for="subject">subject</label></td>
                                <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                            value="{{$share_education->subject}}" class="text modal-text ui-widget-content ui-corner-all"></td>
                            </tr>

                            <tr>
                                <td><label for="email">To</label></td>
                                <td><input type="email" required name="email" id="email" placeholder="Recipient Email" class="text modal-text ui-widget-content ui-corner-all" value=""></td>
                            </tr>

                            <tr>
                                <td><label for="myemail">From</label></td>
                                <td><input type="email" required name="myemail" id="myemail" placeholder="Your Email" class="text modal-text ui-widget-content ui-corner-all" value=""></td>
                            </tr>

                            <tr>
                                <td><label for="name">Name</label></td>
                                <td><input type="text" required name="name" id="name" placeholder="Your Name" class="text modal-text ui-widget-content ui-corner-all"></td>
                            </tr>

                            <tr>
                                <td valign="top"><label for="emailbody">Body</label></td>
                                <td><textarea disabled name="emailbody" id="emailbody" cols="30" rows="6" class="modal-text" wrap="hard">{{$share_education->body}}</textarea></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><!-- Allow form submission with keyboard without duplicating the f button -->
                                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>

            </div>








        </div>






    </section>






    <!-- EDUCATION -->

    {{--formulario para cargar pldge--}}
    {!! Form::open(['route'=>['pledge.store'], 'method'=>'POST', 'id'=>'form-pledge']) !!}
    {!! Form::close() !!}


    {{--formulario para crear sesiones--}}
    {!! Form::open(['route'=>'sessione', 'method'=>'POST', 'id'=>'form-session']) !!}
    {!! Form::close() !!}

    <section class="education">
        <div class="fb-faces">
            <div class="faces lifestyle"></div>
            <div class="faces knowing"></div>
            <div class="faces family"></div>
        </div>
        <!-- MASTER VIDEO -->
        <div id="bg-vid" class="video">
            <!-- <video class="bg-video" src="" type="video/mp4" preload="auto" autoplay loop></video> -->
        </div>
        <div class="dots">
            <h6>Lifestyle</h6>
            <h6>Your Normal</h6>
            <h6>Family History</h6>
        </div>
        <div class="nav">
            <div class="nav-item">Lifestyle</div>
            <div class="nav-item">Your Normal</div>
            <div class="nav-item">Family & Health History </div>
        </div>
        <div class="education-menu">
            <div class="module-hero">
                <div class="how">Understand How</div>
                <h1>Lifestyle</h1>
                <div class="effect">Affects Your Risk</div>
            </div>
            <div class="module-hero">
                <div class="how">Understand How</div>
                <h1>Knowing Your Normal</h1>
                <div class="effect">Affects Your Risk</div>
            </div>
            <div class="module-hero">
                <div class="how">Understand How</div>
                <h1>Family & Health History</h1>
                <div class="effect">Affects Your Risk</div>
            </div>
        </div>

        <!-- LIFESTYLE -->

        <div class="module lifestyle" id="lifestyle-list">
            @foreach($lifestyle_list as $lifestyles)
                <div class="vignette" data-src="{{$lifestyles->video}}">
                    <div class="headlines">
                        <div class="headline">

                            <h3>{!! $lifestyles->title !!}</h3>
                            <h5>{!! $lifestyles->text !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- KNOW YOUR NORMAL -->

        <div class="module normal" id="normal-list">
            @foreach($normal_list as $normals)
                <div class="vignette" data-src="{{$normals->video}}">
                    <div class="headlines">
                        <div class="headline">
                            <h3>{!! $normals->title !!}</h3>
                            <h5>{!! $normals->text !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- FAMILY HISTORY -->

        <div class="module family-history" id="family-list">
            @foreach($family_list as $familys)
                <div class="vignette" data-src="{{$familys->video}}">
                    <div class="headlines">
                        <div class="headline">
                            <h3>{!! $familys->title !!}</h3>
                            <h5>{!! $familys->text !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </section>




@endsection

@section('btn_mobile')
    <div class="assess-start">
        <h3>Assess Your Risk<br></h3>
    </div>
    <div class="lets-go">
        <h3>Let’s Go<br></h3>
    </div>
    <div class="understand">
        <div class="understand-contain">
            <h4>Understand<br>Your Risk<br></h4>
            <div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>
        </div>
        <!-- FACTS -->
        <div class="assessment-facts">
            @foreach($questions as $question)
                <div class="facts">
                    <h5>{!! $question->text_colum !!}</h5>
                </div>
            @endforeach
        </div>
    </div>
    <div class="assess">
        <h4>Assess<br>Your Risk<br></h4>
        <div class="arrow"><img src="{{asset('img/arrow_left.png')}}"></div>
        <!-- <div class="logo-white"><img src="img/brightpink_logo_white.png"></div> -->
        <div class="logo-white"><img src={{ URL::asset('img/brightpink_logo_white.png') }}></div>
    </div>

@endsection


@section('script')
    <script src="{{asset('js/roulette.js')}}"></script>
    <script>

        $(document).ready(function(){

            var ventana_ancho = $(window).width();



if (typeof localStorage === 'object') {
    try {
        localStorage.setItem('localStorage', 1);
        localStorage.removeItem('localStorage');
    } catch (e) {
        Storage.prototype._setItem = Storage.prototype.setItem;
        Storage.prototype.setItem = function() {};
    }
}

            //cuando se recarga la página siempre comienza de la primera pregunta
            //nota: si se comenta la linea de abajo, comenzaria en la ultima pregunta donde se quedó
            sessionStorage.setItem('current_question_position',0);
            sessionStorage.setItem('bottle',0);


            _$window = $(window);
            _$document = $(window.document);

            $('.logo').animate({opacity: 1}, 3000);

            if(sessionStorage.getItem('level')==undefined){
                sessionStorage.setItem('level',1);
            }


            $('.dot').css('background-color','#ff0000');
            setTimeout(function(){
                // $('.assessment').addClass('in');

            },1000)

            var _currentView = "left";
            var _currentModule = null;

            $('.module-hero').on('click', function() {
                _currentModule = $(this).index();
                $('.menu-icon').addClass('module-open')
            });

            var _totalQuestions = sessionStorage.getItem('num_question');
            var _totalHeadlines = sessionStorage.getItem('num_education');


            //intro boton
            $('.action.lifestyle, .assess-start').click(function(){

                $('.assessment').addClass('in');
                $('.intro').addClass('out-up');
                $('.assessment-intro').addClass('in');
                $('.right-column').addClass('in');
            });

            //boton navegacvion para cel
            $('.lets-go').click(function(){

                //alert('a');
                $('.right-column').addClass('in2');
                $('.assessment-intro').addClass('out-up');
                $('.assessment-intro').removeClass('in');

                //con este codigo recargas la pagina en la pregunta que te quedaste
                $('.question').eq(_currentQuestion).addClass('in');
                $('.question').eq(_currentQuestion).removeClass('out');

                //con este codigo recargas de la pregunta 1
                /*$('.question').eq(0).addClass('in');
                $('.question').eq(0).removeClass('out');*/

                $('.facts').eq(_currentQuestion).addClass('in');
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
                $('.assessment-dots').addClass('active');
                $('.fact-icon').addClass('in');

            });

            $('.assessment-intro button').on('click', function() {

               /* if(sessionStorage.getItem('current_question_id')=='null'){

                    //alert('nullo');
                    $('.share.result').addClass('in');
                    $('.assessment-dots').addClass('active');
                    $('.assessment-intro').addClass('out-up');
                    $('.question').eq(_currentQuestion).removeClass('out');

                }else{*/
                    $('.right-column').addClass('in2')
                    $('.assessment-intro').addClass('out-up');
                    $('.assessment-intro').removeClass('in');
                    $('.question').eq(_currentQuestion).addClass('in');
                    $('.question').eq(_currentQuestion).removeClass('out');
                    $('.facts').eq(_currentQuestion).addClass('in');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
                    $('.assessment-dots').addClass('active');
                    $('.fact-icon').addClass('in');
               // }
            });


    //este es si regresa que cargue de frente los resultados

            //funciones de level
            function getlevel(question_id,question_option_id)
            {
                $.each( question_option_id, function( i, val ) {
                    $.get("{{ URL::to('/resultlevelcondition/findlevel') }}",{
                        question_id:question_id,
                        question_option_id:val
                    }, function(resultado)
                    {
                        console.log('level: '+resultado);

                        if(sessionStorage.getItem('level')!=undefined){

                            if(sessionStorage.getItem('level')<resultado){
                                sessionStorage.setItem('level',resultado);
                            }
                        }
                        else
                        {
                            sessionStorage.setItem('level',resultado);
                        }
                    }); /*get*/
                }); /*each*/
            }


            function getlevelBoton(question_id,question_option_id)
            {

                    $.get("{{ URL::to('/resultlevelcondition/findlevel') }}",{
                        question_id:question_id,
                        question_option_id:question_option_id
                    }, function(resultado)
                    {
                        console.log('level: '+resultado);

                        if(sessionStorage.getItem('level')!=undefined){

                            if(sessionStorage.getItem('level')<resultado){
                                sessionStorage.setItem('level',resultado);
                            }
                        }
                        else
                        {
                            sessionStorage.setItem('level',resultado);
                        }
                    }); /*get*/

            }


            if(sessionStorage.getItem('current_question_position')!=undefined){
                _currentQuestion = sessionStorage.getItem('current_question_position');
                var current_question_id = $('.question').eq(_currentQuestion).data('question-id');

                sessionStorage.setItem('current_question_id',current_question_id);
            }else{
                sessionStorage.setItem('current_question_position',0);
                _currentQuestion = 0;
                sessionStorage.setItem('current_question_id',0);
            }

            // console.log(_currentQuestion);

            sessionStorage.setItem('question_mutation_id',0);


            $('.assessment .question').eq(_currentQuestion).removeClass('out');

            $('.fact').removeClass('in');

            $('.fact-mobil').removeClass('in');

//boton

            $('button.button_type').click(function(){
                var question_id = $(this).parents('.question').data('question-id');
                var dato = $(this).text();
                var option = $(this).data('option-id');

                getlevelBoton(question_id,option); // obtiene el level

                // exclusive for question id=17 / male overlay
                if(dato == 'No' && question_id == 17){
                    $('.male-overlay').addClass('in');
                    $('.fact-icon').removeClass('in');
                    overlayOpen = true;
                    return false;
                }else{
                    saveAnswers(question_id, option);
                    if(question_id == {{$last_question->id}} ){
                        nextQuest();
                        showResult();
                    }else{
                        nextQuest();
                    }

                    // var url_next = '{{--$url--}}';
                    // $(location).attr('href',url_next);
                }
            });
//envio del boton de resultados finally
            $('.my-results').click(function(){
                showResult();
            });

//radioboton
            // $('button.radio_button').prop('disabled', !this.checked);

            var quest =  $('.answers').data('question-id2');
            var item = sessionStorage.getItem(quest);

            //var optionn = $('.answers .checkbox input').data('option-id');



            //verifico si hay algun radioboton seleccionado en la pregunta

            $('input[name="radio"]').change(function(i,val){

                var lista = $(this).parent().parent().parent();

                lista.find('.checkbox input').each(function(){
                    if($(this).data('option-id')==item){
                        $(this).prop("checked", "checked");
                    }
                });

                var option = $(this).data('option-id');
                sessionStorage.setItem('question_mutation_id',option);

                //deshabilitando el boton
                $(this).parent().parent().parent().parent().find('.radio_button').prop('disabled', !this.checked);
            });

            /*$('input[name="radio"]').each(function(i,val){
             if($(this).prop('checked')){
             $('button.radio_button').removeAttr("disabled");
             }
             });*/

            $('button.radio_button').click(function(){

                var question_id = $(this).parents('.question').data('question-id');

                var option = [];

                $(this).parent().parent().find('.checkbox-list input:checked').each(function() {
                    option.push($(this).data('option-id'));
                });

                saveAnswers(question_id, option);
                getlevel(question_id,option);

                if(question_id == {{$last_question->id}} ){

                    nextQuest();
                    showResult();

                }else{
                    nextQuest();
                }


            });





//check box



            $('input[name="check"]').each(function(i,val){

                if($(this).prop('checked')){
                    $('button.check_box').removeAttr("disabled");
                }
            });


            $('input[name="check"]').change(function() {

                var boton = $(this).parents('.question').find('.check_box');

                var allCheckboxes = $(this).parent().parent().parent().find('input[name="check"]');
                var noneChecked = true;
                var isChecked = $(this).prop('checked');
                if (isChecked) {
                    if ($(this).hasClass('not-sure') || $(this).hasClass('none-of-above')) {
                        $(allCheckboxes).prop('checked', false);
                    }
                    else {
                        $('input[name="check"].not-sure').prop('checked', false);
                        $('input[name="check"].none-of-above').prop('checked', false);
                    }

                    $(this).prop('checked', true);
                }
                allCheckboxes.each(function (index, item) {
                    // console.log(item.checked);
                    if (item.checked) {
                        noneChecked = false;
                        return false;
                    }
                });

                boton.prop('disabled', noneChecked);
            });

            $('button.check_box').click(function(){

                var question_id = $(this).data('question-id');

                var options = [];

                $(this).parent().parent().find('.checkbox-list input:checked').each(function() {
                    options.push($(this).data('option-id'));
                });
                // console.log(question_id+' | '+options);

                saveAnswers(question_id, options);
                getlevel(question_id, options);

                if(question_id == {{$last_question->id}} ){

                    nextQuest();
                    showResult();
                }else{
                    nextQuest();
                }

            });


//ESPECIALES

            // bottle
            $('.btn-bottle').click(function(){

                row_back();
                maxquestion();
                updateDotsQuestion(_currentQuestion);

                var question_id = $(this).data('question-id');
                var option = sessionStorage.getItem('bottle');

                var bottle_w =  sessionStorage.setItem('bottle_w',$('.drink-slider').width());

                //convertimos el string en numero
                var bottle = parseInt(option);

                saveAnswers(question_id, bottle);
                getlevel(question_id,bottle);

                nextQuest();

            });


            var num_bottles = sessionStorage.getItem('bottle');
            num_bottles = num_bottles*1;

            var bottle_w = sessionStorage.getItem('bottle_w');

            var distancia = (bottle_w*num_bottles)/6;
            //console.log(num_bottles);

            // $('.bottle').css('left',distancia);

            for(i=0; i<num_bottles+1; i++) {
                $('.answers.drinks .drink img').eq(i).css({opacity: 1});
            }

//WEIGHT
            $('.submit-weight').click(function(){
                var question_id = $('.weight-question').data('question-id');
                //  console.log(window.weightInPounds);
                $('.weight-question').addClass('out-up');
                $('.weight-question').removeClass('in');
                $('#height-question').addClass('in');
                $('#height-question').removeClass('out-up');

                nextQuest();

                saveAnswers(question_id, window.weightInPounds);
                getlevel(question_id,window.weightInPounds);

            });

//HEIGHT
            $('.btn-calculate').click(function(){
                $('.height-wrapper').addClass('out-up');
            });


//BMI
            $('#btn-bmi').click(function(){
                var bmi = $('#height-question .bmi-result h3').text();
                var question_id = $('#height-question').data('question-id');
                var bmi_int;

                bmi_int = parseFloat(bmi);
                saveAnswers(question_id, bmi_int);
                getlevel(question_id,bmi_int);
                nextQuest();
            });





            function maxquestion()
            {
                if(sessionStorage['highQuestion']!=undefined)
                {
                    maxQuestion = sessionStorage.getItem('highQuestion');
                }
                else
                {
                    sessionStorage.setItem('highQuestion',(_currentQuestion+1));
                    maxQuestion = 0;
                }
            }
            maxquestion();



            function createDotsQuestion() {

                for (var i = 0; i < {{$count}}-1; i++) {

                    if(i<maxQuestion){
                        var dot = '<div class="dot on"></div>';
                    }else{
                        var dot = '<div class="dot"></div>';
                    }

                    if(i==_currentQuestion){
                        var dot = '<div class="dot active"></div>';
                    }
                    $('.assessment-dots').append(dot);
                }

                for (var i = 0; i < _totalHeadlines; i++) {
                    var dot = '<div class="dot"></div>';
                    $('.education .dots').append(dot);
                };
                /*$('.percdive').html(0 + '/' + _totalHeadlines);
                 $('.percquiz').html(0 + '/' + _totalQuestions);*/
            }

            function updateDotsQuestion(_currentQuestion) {

                if(_currentQuestion>=maxQuestion)
                {
                    sessionStorage.setItem('highQuestion',(_currentQuestion*1+1));

                }else if(_currentQuestion<maxQuestion){
                    //sessionStorage.setItem('highQuestion',(_currentQuestion));

                }



                var _oldQuestion = _currentQuestion-1;

                for (var i = 0; i < {{$count}}; i++) {

                    if(i<=sessionStorage.getItem('highQuestion')-1){
                        $('.assessment-dots .dot').eq(i).addClass('on');
                        $('.assessment-dots .dot').eq(i).removeClass('active');
                    }

                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
                }
            }

            createDotsQuestion();

            function addCharts() {
                chart1 = new DonutChartBuilder('.chart-1',
                        10,
                        3, [1, .01, .01, .01, .01, .01, .01, .01], ['#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF'],
                        null);
                chart2 = new DonutChartBuilder('.chart-2',
                        8,
                        0, [.01, .99], ['#D7006D', '#FFFFFF'],
                        null);
                chart3 = new DonutChartBuilder('.chart-3',
                        8,
                        0, [.01, .99], ['#D7006D', '#FFFFFF'],
                        null);
                chart4 = new DonutChartBuilder('.chart-4',
                        8,
                        8, [.01, .99], ['#D7006D', '#FFFFFF'],
                        null);
                chart5 = new DonutChartBuilder('.chart-5',
                        8,
                        8, [.01, .99], ['#D7006D', '#FFFFFF'],
                        null);
                setTimeout(transCharts, 500);
                /* Only use this if it needs to watch the container and resize with the div
                 $( window ).resize(function() {
                 a.updateDims();
                 });
                 */
            }

            function transCharts() {
                chart1.transitionToValues(5,
                        10, [1, 1, 1, 1, 1, 1, 1, 1], ['#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#D7006D']);
            }

            function updateCharts() {

                $('.dashboard').addClass('flash');
                setTimeout(function() {
                    $('.dashboard').removeClass('flash');
                }, 300);
                // percquiz percdive
                //for questions------------


                var preguntasResueltas = sessionStorage.getItem('highQuestion') - 1;
                if(preguntasResueltas > _totalQuestions){
                    preguntasResueltas = _totalQuestions;
                }



                //for (q in savedQuizProgress) questionsAnswered++;

                var quizProgress =preguntasResueltas + '/' + _totalQuestions;
                var quizPercent =preguntasResueltas / _totalQuestions;
                $(".percquiz").html(quizProgress);

                chart2.transitionToValues(5,
                        8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);
                chart4.transitionToValues(5,
                        8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);


//vamos a sumar todos los educations que han sido vistos
//para eso vamos a utilizar el storage dots_education que es un objeto
                if(sessionStorage.getItem('dots_education')!=undefined){

                    var recupero = sessionStorage.getItem('dots_education');
                    var dots_on = JSON.parse(recupero);
                    var i=0;

                    $.each(dots_on,function(key,value){
                        if(value==1 && key >= 0){
                            i++;
                        }
                    });


                    deepViewed = i;
                }else{
                    deepViewed = 0;
                }

                //deepViewed = sessionStorage.getItem('num_education');

                sessionStorage.setItem('educationView',deepViewed);
                //alert(deepViewed);

                var diveProgress = deepViewed + '/' + _totalHeadlines;
                var divePercent = deepViewed / _totalHeadlines;

                $(".percdive").html(diveProgress);
                chart3.transitionToValues(5,
                        8, [divePercent, 1 - divePercent], 4['#D7006D', '#FFFFFF']);
                chart5.transitionToValues(5,
                        8, [divePercent, 1 - divePercent], 4['#D7006D', '#FFFFFF']);


            }

            //addCharts();
            setTimeout(addCharts,800);
            setTimeout(updateCharts,1000);

            //updateCharts();

            function prevQuest(){

                if(_currentQuestion > 0){
                    var _oldQuestion = _currentQuestion;


                    $('.assessment .question').eq(_currentQuestion).addClass('out');
                    $('.assessment .question').eq(_currentQuestion).removeClass('in');

                    var current_option = sessionStorage.getItem('question_mutation_id');
                    var current_question = sessionStorage.getItem('current_question_id');
                    if((current_question==36 && current_option==56) || (current_question==36 && current_option==58) || (current_question==36 && current_option== 59)){
                        _currentQuestion-=2;
                    }else{
                        _currentQuestion--;
                    }
                    $('.assessment .question').eq(_currentQuestion).removeClass('out');
                    $('.assessment .question').eq(_currentQuestion).removeClass('out-up');
                    setTimeout(function(){
                        $('.assessment .question').eq(_currentQuestion).addClass('in')},10)

                    sessionStorage.setItem('current_question_id',$('.assessment .question').eq(_currentQuestion).data('question-id'));

                    //$('.fact').removeClass('in');
                    // $('.fact').eq(_currentQuestion).addClass('in');

                    $('.facts').removeClass('in');
                    //$('.fact').eq(_currentQuestion).removeClass('out');
                    $('.facts').eq(_currentQuestion).addClass('in');

                    $('.facts-mobil').removeClass('in');
                    //$('.fact').eq(_currentQuestion).removeClass('out');
                    $('.facts-mobil').eq(_currentQuestion).addClass('in');



                    $('.assessment-dots .dot').eq(_oldQuestion).removeClass('active');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');

                    //este es para saber en cual pregunta se ha quedadop, si cambia y de página y regresa va a observar la pregunta donde se quedó
                    sessionStorage.setItem('current_question_position',_currentQuestion);

                }

                $('.share.result').removeClass('in');
            }

            function nextQuest(){
                //addCharts();
                createQuiz();

                $('.assessment .question').eq(_currentQuestion).addClass('out');
                $('.assessment .question').eq(_currentQuestion).removeClass('in');

                //esta es para la parte de mutación
                var current_option = sessionStorage.getItem('question_mutation_id');
                var current_question = sessionStorage.getItem('current_question_id');
                    if((current_question==35 && current_option==56) || (current_question==35 && current_option==58) || (current_question==35 && current_option== 59)){
                        _currentQuestion+=2;
                    }else{
                        _currentQuestion++;
                    }
                $('.assessment .question').eq(_currentQuestion).removeClass('out');


                //$('.assessment .question').eq(_currentQuestion).addClass('in');
                setTimeout(function()
                {
                   $('.assessment .question').eq(_currentQuestion).addClass('in')
                },10);

                setTimeout(function()
                {
                    $('.assessment .question').eq(_currentQuestion).removeClass('out-up');
                },50);

                var question_selected = $('.assessment .question').eq(_currentQuestion).data('question-id');
                sessionStorage.setItem('current_question_id',question_selected);

                $('.facts').removeClass('in');
                //$('.fact').eq(_currentQuestion).removeClass('out');
                $('.facts').eq(_currentQuestion).addClass('in');

                $('.facts-mobil').removeClass('in');
                //$('.fact').eq(_currentQuestion).removeClass('out');
                $('.facts-mobil').eq(_currentQuestion).addClass('in');

                sessionStorage.setItem('current_question_position',_currentQuestion);

                row_back();
                maxquestion();
                updateDotsQuestion(_currentQuestion);
                updateCharts();
				if (/Android|webOS|iPhone|iPod|iPad|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
					var content = Math.max(document.documentElement.clientHeight, window.innerHeight || 0) -200;
					console.log("Setting question height to content");
					$('.assessment-wrap .question').css('height',content);
				}
            }


            function createQuiz()
            {
                if(sessionStorage.getItem('quiz')==undefined)
                {
                    $.get('{{URL::to("answers/createquiz")}}',{},function(e){
                        sessionStorage.setItem('quiz',e);
                    });

                }
            }
            createQuiz();


//boton de back de los dots
            function row_back()
            {
                //la flecha : aparece / desaparece
                if(_currentQuestion==0){
                    $('.assessment-dots .btn-back').removeClass('active');
                }else if(_currentQuestion>0){
                    $('.assessment-dots .btn-back').addClass('active');
                }
            }
            row_back();

            $('.btn-back').on('click',function(){
                prevQuest();
                row_back();
            });


            var answersResult = {};

            function saveAnswers(id_question, value)
            {
				console.log("Saving answer");
                //recupero el json si existe, el storage es string lo convierto a json para poder agregarle propiedades
                if(sessionStorage['answersResult']!=undefined)
                {
                    var recupero = sessionStorage.getItem('answersResult');
					console.log(recupero);
                    answersResult = JSON.parse(recupero);
                }

                var property = id_question;

                //agrego una nueva propiedad al json
                answersResult[property] = value;

                //convierto en string para pode guardarlo en el storage
                answersResultString =  JSON.stringify(answersResult);
				console.log(answersResultString);

                //creamos el sesionstorage
                sessionStorage.setItem('answersResult', answersResultString);
                // sessionStorage.setItem(id_question,value);

                $.get('metricanswer/loadanswer',{option:value,question:id_question,quiz:sessionStorage.getItem('quiz'),session:localStorage.getItem('session')},function(e){
                    console.log('este es metric: '+e);
                });

            }


           //al refrescar la página o cuandpo regresas de educación, esta función carga todos los inputs ingresados hasta ese momento

            function completeInput(){

                $('.question').each(function(i,val){
                    var question_id = $(this).find('.checkbox-list').data('question-id2');

                    if(sessionStorage[question_id]!=undefined){

                        //habilita el boton que tenga alguna respuesta y deshabilita cuando no tiene
                        if($(this).find('.checkbox-list').data('question-id2')==question_id){
                            $(this).find('button').eq(0).removeAttr("disabled");
                        }

                        var option_session = sessionStorage.getItem(question_id);

                        if ($.type(option_session) == 'string') {
                            var myArray = option_session.split(',');
                        } else {
                            var myArray = [];
                        }

                        $(this).find('.checkbox-list .checkbox input').each(function(){
                            var now = $(this);
                            $.each(myArray, function(i,val){
                                if(now.data('option-id')==val){
                                    now.prop("checked", "checked");
                                }
                            });
                        });

                    }
                });
            }
            completeInput();

            function showResult(){

                //$('.share.result').addClass('in');

                sessionStorage.setItem('test_final','result');
                var url = 'results';
                $(location).attr('href',url);
            }



            function toggleColumn() {



                if (_currentView == "left") {
                    _currentView = "right";
                    $('.logo').addClass('out');
                    if (_currentModule != undefined) {
                        setTimeout(function() {
                            $('.right-column').addClass('down');
                            $('.nav').addClass('in');
                        }, 800)
                    }
                } else {
                    $('.logo').removeClass('out');
                    _currentView = "left"
                    setTimeout(function() {
                        $('.right-column').removeClass('down');
                        $('.nav').removeClass('in');
                    }, 800)
                }
                $('.fact-icon').toggleClass('out');
                $('.assessment').toggleClass('in');
                $('.right-column').toggleClass('left');
                $('.menu-icon').toggleClass('left');
                $('.education').toggleClass('in');
            }



            $('.understand').on('click', function() {
                toggleColumn();

                // var url = '../education';
                //$(location).attr('href',url);
            })

            $('.assess').on('click', function() {

                toggleColumn();
                // window._currentPath = '/assessment';
                // $.address.value('/assessment');
            })

        });


// modal
        $(function() {
            var dialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                    name = $( "#name" ),
                    email = $( "#email" ),
                    emailbody = $( "#emailbody" ),
                    myemail = $( "#myemail" ),
                    subject = $( "#subject" ),
                    allFields = $( [] ).add( name ).add( email ).add( emailbody).add( myemail ).add( subject ),
                    tips = $( ".validateTips" );

            function updateTips( t ) {
                tips
                        .text( t )
                        .addClass( "ui-state-highlight" );
                setTimeout(function() {
                    tips.removeClass( "ui-state-highlight", 1500 );
                }, 500 );
            }

            function checkLength( o, n, min, max ) {
                if ( o.val().length > max || o.val().length < min ) {
                    o.addClass( "ui-state-error" );
                    updateTips( "Length of " + n + " must be between " +
                    min + " and " + max + "." );
                    return false;
                } else {
                    return true;
                }
            }

            function checkRegexp( o, regexp, n ) {
                if ( !( regexp.test( o.val() ) ) ) {
                    o.addClass( "ui-state-error" );
                    updateTips( n );
                    return false;
                } else {
                    return true;
                }
            }

            function sendEmail() {
                var valid = true;
                allFields.removeClass( "ui-state-error" );

                valid = valid && checkLength( name, "username", 3, 16 );
                valid = valid && checkLength( email, "email", 6, 80 );

                valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
                valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );

                if ( valid ) {
                    $( "#users tbody" ).append( "<tr>" +
                    "<td>" + name.val() + "</td>" +
                    "<td>" + email.val() + "</td>" +
                    "</tr>" );
                    dialog.dialog( "close" );
                }
                return valid;

            }

            dialog = $("#dialog-form").dialog({

                autoOpen: false,
                height: 500,
                width: 350,
                modal: true,
                buttons: {
                    "Send e-mail": sendEmail
                    /*Cancel: function() {
                     dialog.dialog( "close" );
                     }*/
                },
                close: function() {
                    form[ 0 ].reset();
                    allFields.removeClass( "ui-state-error" );
                }
            });

            form = dialog.find( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                // sendEmail();
            });


            $( ".create-modal" ).click(function(e) {
                e.preventDefault();
                $("#dialog-form").find('textarea').html($(this).data('body'));
                $("#dialog-form").find('#subject').attr('value',$(this).data('subject'));
                dialog.dialog( "open" );
            });

            function buttons(){

                $('.facebook.lifestyle').click(function() {
                    console.log('click');

                    var form = $('#form-pledge');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var session = localStorage.getItem('session');
                    var category = 1;
                    data = data+'&session='+session+'&category_id='+category;

                    $('.lifestyle-pledge-number').text('You and '+ {{$pledge_lifestyle}} +' women have pledged to improve your lifestyles');
                    $('.lifestyle-pledge-number').next().text('');
                    $('.facebook.lifestyle').css({display: "none"});

                    $.post(url,data,function(){
                        //localStorage.setItem('session',last_id);
                    })




                })

                $('.facebook.knowing').click(function() {
                    console.log('click');

                    var form = $('#form-pledge');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var session = localStorage.getItem('session');
                    var category = 2;
                    data = data+'&session='+session+'&category_id='+category;

                    $('.knowing-pledge-number').text('You and '+ {{$pledge_normal}} +' women have pledged to know your normal');
                    $('.knowing-pledge-number').next().text('');
                    $('.facebook.knowing').css({display: "none"});

                    $.post(url,data,function(){
                        //localStorage.setItem('session',last_id);
                    })
                })



                $('.facebook.family').click(function() {
                    console.log('click');

                    var form = $('#form-pledge');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var session = localStorage.getItem('session');
                    var category = 3;
                    data = data+'&session='+session+'&category_id='+category;

                    $('.family-pledge-number').text('You and '+ {{$pledge_normal}} +' women have pledged to learn about their family history');
                    $('.family-pledge-number').next().text('');
                    $('.facebook.family').css({display: "none"});

                    $.post(url,data,function(){
                        //localStorage.setItem('session',last_id);
                    })
                })
            }

            buttons();






 //EDUCATION-----------------------------

//lifestyle
            $('#lifestyle-list .vignette').first().addClass('main');
            $('#lifestyle-list .vignette').first().find('.headline').prepend(

                    '<div class="section-title">Understand Your Risk</div>'
            );
            $('#lifestyle-list .vignette').first().find('.headline').append('<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            //agregamos clases y html para la ultima vigneta
            $('#lifestyle-list .vignette').last().addClass('last');
            $('#lifestyle-list .vignette').last().find('.headline').addClass('last');
            $('#lifestyle-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            $.get('{{route("pledge/countByCategory")}}',{
                category:1,
                session:localStorage.getItem('session')
            },function(result){

                if(result==1){


                    $('#lifestyle-list .vignette').last().find('.headline h3').first().addClass('hidden');
                    $('#lifestyle-list .vignette').last().find('.headline h5').first().addClass('hidden');

                    $('#lifestyle-list .vignette').last().find('.headline h3').addClass('lifestyle-pledge-number');

                    $('#lifestyle-list .vignette').last().find('.headline h5').after('<h3 class="lifestyle-pledge-number">You and '+{{$pledge_lifestyle}}+' women have pledged to improve your lifestyles</h3>');

                }else{
                    $('#lifestyle-list .vignette').last().find('.headline h3').prepend('<span class="lifestyle-count">{{$pledge_lifestyle}}</span> ');
                    $('#lifestyle-list .vignette').last().find('.headline h3').addClass('lifestyle-pledge-number');

                    $('#lifestyle-list .vignette').last().find('.headline h5').after('<button class="facebook lifestyle">Pledge</button>');

                    buttons();
                }
            });

            $('#lifestyle-list .vignette').last().find('.headline').append('<button class="btn-continue sub">CONTINUE TO KNOW YOUR NORMAL →</button>');

// normal

            //agregamos clases y html para la primera vigneta
            $('#normal-list .vignette').first().addClass('main');
            $('#normal-list .vignette').first().find('.headline').prepend('<div class="section-title">Understand Your Risk</div>');
            $('#normal-list .vignette').first().find('.headline').append('<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            //agregamos clases y html para la ultima vigneta
            $('#normal-list .vignette').last().addClass('last');
            $('#normal-list .vignette').last().find('.headline').addClass('last');
            $('#normal-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            $.get('{{route("pledge/countByCategory")}}',{
                category:2,
                session:localStorage.getItem('session')
            },function(result){
                if(result==1){


                    $('#normal-list .vignette').last().find('.headline h3').first().addClass('hidden');
                    $('#normal-list .vignette').last().find('.headline h5').first().addClass('hidden');

                    $('#normal-list .vignette').last().find('.headline h3').addClass('knowing-pledge-number');

                    $('#normal-list .vignette').last().find('.headline h5').after('<h3 class="normal-pledge-number">You and '+{{$pledge_normal}}+' women have pledged to improve your normals</h3>');

                }else{
                    $('#normal-list .vignette').last().find('.headline h3').prepend('<span class="normal-count">{{$pledge_normal}}</span> ');
                    $('#normal-list .vignette').last().find('.headline h3').addClass('knowing-pledge-number');

                    $('#normal-list .vignette').last().find('.headline h5').after('<button class="facebook knowing">Pledge</button>');

                    buttons();
                }
            });

            $('#normal-list .vignette').last().find('.headline').append('<button class="btn-continue sub">CONTINUE TO FAMILY HISTORY →</button>');




//family
            //agregamos clases y html para la primera vigneta
            $('#family-list .vignette').first().addClass('main');
            $('#family-list .vignette').first().find('.headline').prepend(
                    '<div class="section-title">Understand Your Risk</div>'
            );
            $('#family-list .vignette').first().find('.headline').append(
                    '<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="{{asset('img/arrow_right.png')}}"></div>'
            );

            //agregamos clases y html para la ultima vigneta
            $('#family-list .vignette').last().addClass('last');
            $('#family-list .vignette').last().find('.headline').addClass('last');
            $('#family-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            $.get('{{route("pledge/countByCategory")}}',{
                category:3,
                session:localStorage.getItem('session')
            },function(result){
                if(result==1) {

                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline"><h3 class="family-pledge-number">You and '+{{$pledge_family}}+' women have pledged to learn about their family history</h3></div>');
                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline last"><div class="share"><div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div><h3>Save the life of somebody you love. Tell them to complete this experience too.</h3><br><span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share(\'http://www.assessyourrisk.org\', \'Assess Your Risk\', \'1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.\', \'http://www.assessyourrisk.org/img/fb-share.png\', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a   href="#" id="create-modal" target="_blank" class="mail-icon create-modal"><i class="fa fa-envelope fa-lg"></i></a>SHARE</span></div></div>');


                }else{
                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline"><h3 class="family-pledge-number"> Women Have Pledged to Collect Their Family History</h3><h5>You can join them. By clicking the pledge button below, you’ll make that number go higher.</h5><button class="facebook family">Pledge</button></div>');
                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline last"><div class="share"><div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div><h3>Save the life of somebody you love. Tell them to complete this experience too.</h3><br><span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share(\'http://www.assessyourrisk.org\', \'Assess Your Risk\', \'1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.\', \'http://www.assessyourrisk.org/img/fb-share.png\', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a  href="#" id="create-modal2" target="_blank" class="mail-icon create-modal"><i class="fa fa-envelope fa-lg"></i></a>SHARE</span></div></div>');
                    $('#family-list .vignette').last().find('.headline .family-pledge-number').prepend('{{$pledge_family}}');
                    buttons();



                }

                function modal_up(){

                    var dialog, form,

                    // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                            name = $( "#name" ),
                            email = $( "#email" ),
                            subject = $( "#subject" ),
                            myemail = $( "#myemail" ),
                            emailbody = $( "#emailbody" ),

                            allFields = $( [] ).add( name ).add( email).add( subject ).add( myemail).add( emailbody ),
                            tips = $( ".validateTips" );

                    function updateTips( t ) {
                        tips
                                .text( t )
                                .addClass( "ui-state-highlight" );
                        setTimeout(function() {
                            tips.removeClass( "ui-state-highlight", 1500 );
                        }, 500 );
                    }

                    function checkLength( o, n, min, max ) {
                        if ( o.val().length > max || o.val().length < min ) {
                            o.addClass( "ui-state-error" );
                            updateTips( "Length of " + n + " must be between " +
                            min + " and " + max + "." );
                            return false;
                        } else {
                            return true;
                        }
                    }

                    function checkRegexp( o, regexp, n ) {
                        if ( !( regexp.test( o.val() ) ) ) {
                            o.addClass( "ui-state-error" );
                            updateTips( n );
                            return false;
                        } else {
                            return true;
                        }
                    }

                    function sendEmail() {
                        var valid = true;
                        allFields.removeClass( "ui-state-error" );

                        valid = valid && checkLength( name, "username", 3, 16 );
                        valid = valid && checkLength( email, "email", 6, 80 );
                        valid = valid && checkLength( myemail, "myemail", 6, 80 );
                        valid = valid && checkLength( subject, "subject", 3, 200 );
                        valid = valid && checkLength( emailbody, "emailbody", 3, 20000 );

                        //valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
                        valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
                        valid = valid && checkRegexp( myemail, emailRegex, "eg. ui@jquery.com" );

                        if ( valid ) {
							resp = $.ajax({
							  type : "GET",
							  cache: false,
							  //url : "/sendmail/mail",
							  url : "{{route('sendmail.mail')}}",
							  data : 'name=' + name.val() + '&email=' + email.val() + '&myemail=' + myemail.val() + '&subject=' + subject.val() + '&emailbody=' + encodeURIComponent(emailbody.val())
							}).done(function(data) {
								alert("Email sent successfully.");
							}).fail(function(error) {
								alert("Email failed to send.");
							});

                            $( "#users tbody" ).append( "<tr>" +
                            "<td>" + name.val() + "</td>" +
                            "<td>" + email.val() + "</td>" +
                            "</tr>" );
                            dialog.dialog( "close" );
                        }
                        return valid;

                    }

                    dialog = $( "#dialog-form" ).dialog({
                        autoOpen: false,
                        height: 500,
                        width: 350,
                        modal: true,
                        buttons: {
                            "Send e-mail": sendEmail
                            /*Cancel: function() {
                             dialog.dialog( "close" );
                             }*/
                        },
                        close: function() {
                            form[ 0 ].reset();
                            allFields.removeClass( "ui-state-error" );
                        }
                    });

                    form = dialog.find( "form" ).on( "submit", function( event ) {
                        event.preventDefault();
                        sendEmail();
                    });

                    $( "#create-modal" ).click(function(e) {
                        e.preventDefault();
                        dialog.dialog( "open" );

                    });

                    $( ".create-modal" ).click(function(e) {
                        e.preventDefault();
                        $("#dialog-form").find('textarea').html($(this).data('body'));
                        $("#dialog-form").find('#subject').attr('value',$(this).data('subject'));
                        dialog.dialog( "open" );
                    });
                }


                modal_up();
                $('#create-modal2').click(modal_up);
            });





            /* LOS RESULTADOS */
            //sacar el nivel


            if(sessionStorage.getItem('current_question_id')=='null'){
                if(sessionStorage.getItem('current_question_id')=='null'){
                    $('.right-column').addClass('in2')
                    $('.assessment-intro').addClass('out-up');

                    $('.question').eq(_currentQuestion).addClass('in');
                    $('.question').eq(_currentQuestion).removeClass('out');
                    $('.facts').eq(_currentQuestion).addClass('in');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
                    $('.assessment-dots').addClass('active');
                    $('.fact-icon').addClass('in');
                    $('.share.result').addClass('in');
                    $('.question').eq(_currentQuestion).removeClass('out');
                    $('.question').eq(_currentQuestion).removeClass('out');
                    $('.assessment').addClass('in');
                    $('section.intro').addClass('out-up2');
                    $('.assessment-intro').addClass('in');
                    $('.right-column').addClass('in');
                    $('.assessment.scrollpane').addClass('inn');
                }
            }



            function calculate_height(){
                var window2 = $(window).height();
                var content = window2-200;
                console.log(content);
                $('.assessment-wrap .question').css('height',content);
            }

            function firts_factmobil()
            {
               // $('.right-column .facts-mobil').eq(0).css('opacity',1);
                $('.assessment-facts .facts-mobil').eq(0).addClass('in');
            }



        if (/Android|webOS|iPhone|iPod|iPad|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var ancho = $(window).height();
            if(ancho<736){
                calculate_height();
                firts_factmobil();
            }
		}

            if(/webOS|iPhone|iPod|iPad/i.test(navigator.userAgent)) {
                $('.male-overlay .share-btn').click(function(){
                    console.log('iphone');
                });
            }


        });


        $(document).ready(function(){
if (typeof localStorage === 'object') {
    try {
        localStorage.setItem('localStorage', 1);
        localStorage.removeItem('localStorage');
    } catch (e) {
        Storage.prototype._setItem = Storage.prototype.setItem;
        Storage.prototype.setItem = function() {};
    }
}

            console.log('{{route('sendmail.mail')}}');

            //load metrics
            var width = $(window).width();
            var height = $(window).height();//alto de ventana
            console.log("Width: " + width);
            console.log("Height: " + height);
        
            var language = x=window.navigator.language||navigator.browserLanguage;//detectamos el lenguaje

            var bpref = "<?php if(isset($_GET['bpref'])){ echo $_GET['bpref'];}else{ echo '0';} ?>";


           // if(localStorage.getItem('session')==undefined || localStorage.getItem('session')=='')
            //{
                var form = $('#form-session');
                var data = form.serialize();
                var token = form.find('#token').val();



                $.post('sessione',data,function(last_id){
                    localStorage.setItem('session',last_id);

                    //carga métricas

                    var referer = "{{URL::previous()}}";
                    $.get('{{ route('metric.load')}}',{referer:referer,session:last_id,bpref:bpref,width:width,height:height,language:language},function(){});

                })
           /* }
            else
            {
                //numSession es el numero de id de la session del usuario
                var numSession = localStorage.getItem('session');
                //carga metricas
                $.get('{{-- route('metric.load')  --}}',{session:numSession,bpref:bpref,width:width,height:height,language:language},function(){});
            }*/
        })


    </script>

    <script src="{{asset('js/main.js')}}?cversion=7"></script>

@endsection
