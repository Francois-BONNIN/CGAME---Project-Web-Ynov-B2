@extends('layouts.app')

@section('welcome')
    <div class="parent mt-auto">
            <div class="logo m-md" id= 'lineDrawing'>
                <svg id="Logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-350 -125 1470 400">
                    <g class="lines">
                    <path class="cls-1" d="M288.4017,102.7l-17.7241,16.0471c-1.4276-1.2589-2.6066-2.3148-3.8027-3.3508-12.3464-10.6938-31.43-10.3733-41.872,1.2039-8.2954,9.197-8.9178,20.2169-4.653,31.276,4.1947,10.8773,12.8965,16.1991,24.4619,16.2668,4.35.0254,8.7195-1.0187,13.0569-1.7192,2.4948-.403,3.4142-1.9948,3.3585-4.5918-.1468-6.8345.0483-13.6761-.0851-20.5111-.0551-2.82,1.0185-3.7628,3.7717-3.6975q8.8437.21,17.6956,0c2.7112-.061,3.83.797,3.8025,3.6631-.1144,11.7972.0028,23.5966-.1284,35.3935a5.0914,5.0914,0,0,1-1.74,3.6529c-18.8,12.9807-52.6119,17.2771-74.0816,1.6067-17.6182-12.8591-23.814-30.7013-20.21-51.6433,3.7034-21.5194,17.464-34.8232,38.2042-39.9509,19.8609-4.91,38.9144-2.5463,55.299,11.2352a33.6543,33.6543,0,0,1,2.8388,2.8368C287.1282,100.9892,287.5726,101.6443,288.4017,102.7Z"/>
                    <path class="cls-1" d="M178.4247,103.08l-18.0711,16.3456c-7.4383-8.5816-16.4972-12.77-27.6375-11.3667a25.528,25.528,0,0,0-16.78,8.6022c-9.2664,10.7227-8.8614,30.0967.8837,39.9459,11.1365,11.2554,27.92,9.9891,43.7444-3.5949,2.9012,2.5927,5.8686,5.2233,8.8118,7.8806,2.8668,2.5883,5.7089,5.204,9.4078,8.58-4.1841,3.5256-7.7285,7.1531-11.8634,9.8879-20.3055,13.43-58.806,12.7409-77.11-13.0745C71.2559,140.1162,79.2956,94,122.96,85.463c18.3832-3.5942,35.82-.6266,50.4557,12.3439C175.0854,99.2865,176.507,101.0458,178.4247,103.08Z"/>
                    <path class="cls-1" d="M413.5148,186.0284c-9.469,0-18.5312.1231-27.58-.1634-1.0733-.0339-2.4745-2.146-3.0511-3.5677-8.4608-20.8626-16.8046-41.7727-25.1876-62.667-.5336-1.33-1.16-2.623-2.136-4.8156-.9755,2.1545-1.657,3.52-2.2237,4.932-8.3359,20.7691-16.71,41.5231-24.9191,62.3424-1.1473,2.91-2.53,4.1748-5.8209,4.0692-8.005-.2567-16.0238-.0835-24.6133-.0835.6826-1.7983,1.0888-3.034,1.6105-4.2187,13.504-30.6634,27.0656-61.3017,40.4612-92.0123,1.2937-2.9659,2.8981-3.9422,6.03-3.8365,6.6974.226,13.4094.1566,20.1117.0243,2.4466-.0482,3.8607.6433,4.9054,3.023Q391.6274,135.8087,412.32,182.49C412.738,183.4382,412.9906,184.46,413.5148,186.0284Z"/>
                    <path class="cls-1" d="M427.5708,86.1027c7.9279,0,14.7625-.1884,21.57.1578,1.3725.07,3.02,1.9332,3.901,3.3635,9.7016,15.7461,19.275,31.5712,28.8876,47.3721,1.1679,1.92,2.3614,3.8236,3.9165,6.3387,1.0848-1.7422,1.8547-2.9295,2.5765-4.1454,9.7141-16.3647,19.4877-32.6948,29.0681-49.1375,1.6752-2.8752,3.4562-4.2443,6.9213-4.0592,5.7344.3065,11.4971.0834,17.9883.0834-.8371,1.805-1.3384,3.1132-2.0191,4.32q-23.1037,40.9615-46.1871,81.9343c-1.6448,2.9358-3.5213,4.5068-6.95,4.02a14.2646,14.2646,0,0,0-4.013.0012c-3.1524.46-4.8569-1.0692-6.3484-3.6777Q454.9377,134.2962,432.8488,96C431.139,93.0219,429.61,89.94,427.5708,86.1027Z"/>
                    <path class="cls-1" d="M608.7812,108.14c-11.649.0015-23.3-.1107-34.946.0691-3.5471.0548-5.1362-.8206-4.89-4.6745.2978-4.6676.1644-9.3706.0445-14.0538-.0675-2.6338,1.0027-3.4491,3.5707-3.4418q36.152.1031,72.304-.0108c2.8914-.0108,3.7183,1.1028,3.6451,3.7854-.1314,4.8166-.16,9.6438.0079,14.4582.1044,2.99-1.0345,3.9494-3.9859,3.9185C632.6156,108.0658,620.698,108.1389,608.7812,108.14Z"/>
                    <path class="cls-1" d="M608.7294,164.0113c11.7829-.0011,23.567.088,35.348-.0593,3.2254-.04,4.6234.85,4.4547,4.2783-.23,4.6751-.1449,9.3722-.0256,14.0555.0667,2.62-.6363,3.85-3.5907,3.8383q-36.1517-.1407-72.3039-.0007c-2.9132.0111-3.6979-1.1436-3.6284-3.8031.1258-4.817.1592-9.6439-.0091-14.4583-.1052-3.0071,1.0849-3.9282,4.0051-3.8991C584.8951,164.0814,596.8126,164.0123,608.7294,164.0113Z"/>
                    <path class="cls-1" d="M608.2887,145.9709c-11.6489.0007-23.2991-.0978-34.9457.0633-3.3165.0459-4.5437-1.0147-4.3812-4.3552.2208-4.5417.12-9.1032.0382-13.654-.0421-2.333.7575-3.3489,3.25-3.3426q36.553.0922,73.1063,0c2.6091-.0069,3.1631,1.235,3.1321,3.4554-.0653,4.6854-.1505,9.3774.0294,14.0568.119,3.0931-1.2453,3.8459-4.0777,3.821C632.39,145.9092,620.3392,145.97,608.2887,145.9709Z"/>
                    <path class="cls-1" d="M542.9518,124.8763c.1812,2.0282.3408,3.0286.35,4.03.1525,17.4243.1856,34.8505.5026,52.2716.07,3.8494-1.01,5.1892-4.9422,4.9786-5.8811-.3152-11.7939-.181-17.6885-.04-2.6841.0642-3.6686-.74-3.8708-3.5929a34.48,34.48,0,0,1,5.1442-21.71c6.3927-10.2075,11.891-20.9748,17.7845-31.4958C540.9176,128.0927,541.6964,126.919,542.9518,124.8763Z"/>
                    <path class="cls-1" d="M427.9519,126.4347c1.0165,1.5389,1.6419,2.3685,2.1458,3.2661,7.407,13.1942,15.2375,26.18,21.9355,39.7254,2.1235,4.2944,1.2685,10.0841,1.6,15.201.0276.4251-1.2923,1.3382-1.9958,1.3484-7.2317.105-14.4656.0665-21.6988.0763-3.0212.004-2.4665-2.285-2.4706-4.0281q-.0607-25.92-.0082-51.84A34.213,34.213,0,0,1,427.9519,126.4347Z"/>
                    </g>
                </svg>
            </div>
    </div>
    <div>
         <div class="album py-5 hidden">
            <div class="container">
    
                <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 g-3">
                    @foreach ($games as $game)
                    <div class="col">
                        <div class="card card-shadow mb-4">
                            <img class="card-img-top" src="{{ $game -> image }}"/>
            
                            <div class="card-body">
                                <div class="align-items-center">
                                <h2 class="text-center bg-danger">{{ $game -> name }}</h2>
                                <p class="text-right">{{ $game -> grade}} <i class="far fa-star"></i></p>
                                </div>
                                <p class="card-text">{{ $game -> description }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                      <a href="{{ route('games.show', $game )}}"<button type="button" class="btn btn-sm btn-outline-light">Details</a>
                                      <button type="button" class="btn btn-sm btn-outline-danger">Acheter</button>
                                    </div>
                                    <h3 class="mb-0 price">{{ $game -> price }}€</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer text-center mt-2 fadeIn">
        <div class="footer-copyright py-3">
          © 2021 François BONNIN - <a href="{{ url('/') }}"> Cgame.com </a>
        </div>
    </footer>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
    <script src="/js/index.js"></script>
@endsection