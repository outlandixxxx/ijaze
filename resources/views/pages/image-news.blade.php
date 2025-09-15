@extends('layouts.app')
@section('content')
    <div class="container mt-11 text-end">
        <div class="row text-end mx-auto">

            <!-- Left sidebar: Social share -->
            <div class="col-12 col-md-2 mb-3 d-flex flex-column align-items-center justify-content-start">
                <h6 class="mb-3">شارك</h6>
                <ul class="list-unstyled d-flex flex-md-column gap-4 gap-md-3">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" class="text-decoration-none text-primary">
                            <i class="fa-brands fa-square-facebook fa-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" class="text-decoration-none text-white">
<i class="fa-brands fa-square-x-twitter fa-2xl" ></i>                    </a>
                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" class="text-decoration-none text-success">
                            <i class="fa-brands fa-square-whatsapp fa-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" class="text-decoration-none text-primary">
<i class="fa-brands fa-square-linkedin fa-2xl"></i>                        </a>
                    </li>

                    <li>
            <a href="javascript:void(0);" onclick="copyPageLink()" 
               class="text-decoration-none text-white" title="نسخ الرابط">
                <i class="fa-solid fa-link fa-2xl"></i>
            </a>
        </li>
                </ul>
            </div>

            <!-- Last news sidebar -->
            <div class="col-12 col-md-3 mb-3">
                <h5>أخبار سابقة</h5>
                <div class="border-top pt-2">
                    <ul class="list-unstyled">
                        @for ($i = 1; $i <= 10; $i++)
                            <li class="mb-2">
                                <a href="#"
                                   class="d-flex justify-content-end align-items-center gap-2 flex-nowrap text-decoration-none text-white">
                                    <h4 class="mb-0 fs-6 text-truncate" style="max-width: 200px;">
                                        عنوان الخبر {{ $i }}
                                    </h4>
                                    <span class="fs-6" style="white-space: nowrap;">12-10-2025</span>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>

                <h5>صوت و صورة</h5>
                <div class="border-top pt-2">
                    <ul class="list-unstyled d-flex flex-column gap-2 text-end">
                        @for ($i = 1; $i <= 6; $i++)
                            <li>
                                <a href="#" class="text-decoration-none d-block">
                                    <div class="position-relative overflow-hidden rounded ms-auto"
                                         style="width: 200px; transition: transform 0.3s;">
                                        <!-- Video thumbnail -->
                                        <img src="{{ asset('images/videos/video' . $i . '.png') }}" class="img-fluid"
                                             alt="Video {{ $i }}">

                                        <!-- Overlay title -->
                                        <div
                                            class="position-absolute bottom-0 start-50 translate-middle-x w-100 p-1 text-white bg-dark bg-opacity-50 text-center transition-hover">
                                            فيديو {{ $i }}
                                        </div>

                                        <!-- Play button -->
                                        <div class="position-absolute top-0 start-0 m-2 text-white">
                                            <i class="fa-solid fa-circle-play fa-2xl"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>

            <!-- Main news -->
            <div class="col-12 col-md-7">
                <h3 class="mb-3">الخبر الأول</h3>

                  @if($news->type === 'image')
                
                <!-- Image -->
                <div class="text-center">
                    <img src="{{ asset('images/carousel/3.jpg') }}" class="rounded img-thumbnail img-fluid"
                         alt="الخبر الأول">
                </div>

                <div class="mb-3  text-start">
                    <span class="badge text-secondary me-1">بقلم نخنى يؤؤؤ</span>
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <p>ضت المحكمة الدستورية بإلغاء انتخاب الطاهر الفلالي عضوًا بمجلس المستشارين عن الهيئة الناخبة لممثلي الغرف الفلاحية بجهات الرباط ــ سلا ــ القنيطرة وبني ملال ــ خنيفرة والدار البيضاء ــ سطات، بموجب الانتخاب الجزئي الذي أُجري في فاتح يوليوز الماضي.</p>
                    <p>نَت المحكمة قرارها رقم 258/25 على عريضة مسجلة بأمانتها العامة بتاريخ الرابع عشر من يوليوز الماضي، قدّمها والي جهة بني ملال ــ خنيفرة عامل عمالة إقليم بني ملال، بصفته هاته، طالبًا فيها التصريح ببطلان نتيجة الانتخاب الجزئي المذكور.</p>
                    <p>بيّنت المحكمة ذاتها أن الحكم الابتدائي الصادر عن المحكمة الابتدائية ببني ملال، الذي سبق أن ألغى قرار رفض ترشيح المعني بالأمر، خالف مقتضيات المادة 24 من القانون التنظيمي رقم 28.11 المتعلق بمجلس المستشارين.

كما شدّدت “الدستورية” على أن صفة الناخب، باعتبارها شرطًا جوهريًا للترشح، لا تُستمدّ إلا من التسجيل القانوني في اللوائح الانتخابية العامة، وفق المقتضيات القانونية ذات الصلة، لا سيما القانون التنظيمي رقم 28.11 المذكور والقانون رقم57.11 المتعلق باللوائح الانتخابية العامة، اللذين يؤطّران عملية التسجيل وشروطها بدقة ويربطانها مبدئيا بالإقامة الفعلية وبالبطاقة الوطنية.

وأمرت المحكمة، على ضوء هذه المعطيات، بتبليغ قرارها إلى كل من رئيس مجلس المستشارين والسلطة الإدارية التي تلقت الترشيحات بالدائرة الانتخابية لجهات الرباط ــ سلا ــ القنيطرة وبني ملال ــ خنيفرة والدار البيضاء ــ سطات، وبنشره في الجريدة الرسمية.

كما دعت إلى إجراء انتخابات جزئية لشغل المقعد الشاغر استنادًا إلى مقتضيات المادة 92 من القانون التنظيمي رقم 28.11 الخاص بمجلس المستشارين.</p>
                </div>

                @elseif($news->type === 'video')
        <!-- YouTube Video -->
        <div class="ratio ratio-16x9 mb-3">
            <iframe src="https://www.youtube.com/embed/{{ $news->video_id }}"
                    title="{{ $news->title }}"
                    frameborder="0"
                    allowfullscreen></iframe>
        </div>

                <!-- Tags / Categories -->
                <div class="mb-3 text-end">
                    <span class="badge bg-light me-1 text-dark">رياضة</span>
                    <span class="badge bg-light me-1 text-dark">سياسة</span>
                    <span class="badge bg-light text-dark">ثقافة</span>
                </div>
            </div>

        </div>
    </div>
@endsection
