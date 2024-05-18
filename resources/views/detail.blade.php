@include("template/head",["css"=>"detail"])
@include("template/navbar")

        <div class="body-container">
            @include("template/detailbox", ["data" => $data])
            
            <!-- Put your code here -->
            @if($type == "home_to_school")
                <h1>Home To School Bus</h1>
            @else
                <h1>School To Home Bus</h1>
            @endif

            <div class="text-box">
                <p>Home</p>
                <div class="bus-info">
                    <p>Bus No: {{$details->bus_no}}</p>
                    <p>Bus Plate: {{$details->bus_plate}}</p>
                    <p>Color: {{$details->color}}</p>
                </div>
                <p>Mobile No: {{$details->phone_number}}</p>
            </div>
            <div class="driver-profile">
                <div class="images">
                    <img src="https://scontent.fbkk29-6.fna.fbcdn.net/v/t1.6435-9/95436589_104083364637234_6907456676496932864_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=yvE9fKMHgP4Q7kNvgGtRKcc&_nc_ht=scontent.fbkk29-6.fna&oh=00_AfCp7UYMzgl-CTIpOcRzFpKc4dw7PpExU4gMmjbNGj4-Cg&oe=665C2817"/>
                    <img src="https://scontent.fbkk29-6.fna.fbcdn.net/v/t1.6435-9/95436589_104083364637234_6907456676496932864_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=yvE9fKMHgP4Q7kNvgGtRKcc&_nc_ht=scontent.fbkk29-6.fna&oh=00_AfCp7UYMzgl-CTIpOcRzFpKc4dw7PpExU4gMmjbNGj4-Cg&oe=665C2817"/>
                </div>
                <div class="driver-details">
                    <div>
                        <p>Driver: {{$details->driver_name}}</p>
                        <p>Liscense No: {{$details->license_no}}</p>
                    </div>
                    <div>
                        <p>Monitor Name: {{$details->monitor}} </p>
                        <p>Insurance Company: {{$details->insurance}}</p>
                        <p>Policy no: {{$details->policy_no}}</p>
                    </div>        
                </div>
            </div>
            @include("map", ["type"=>$type])


            {{-- <video>
                <source src="http://61.211.241.239/nphMotionJpeg?Resolution=320x240&Quality=Standard"/>
            </video> --}}

            {{-- <iframe src="http://61.211.241.239/nphMotionJpeg?Resolution=320x240&Quality=Standard" width="320px" height="240px">

            </iframe> --}}

        
            <!-- Put your code here -->
        </div>

@include("template/footer")
@include("template/foot")    