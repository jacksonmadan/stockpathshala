<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Class Listings</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
body {
    background: url('{{ asset('images/bg-image.jpg') }}') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
}
.container {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 30px;
    border-radius: 8px;
}
.class-card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    color: #000;
}
.class-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.class-card-body {
    padding: 20px;
}
.card-title {
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
}
.card-text {
    font-size: 1rem;
    margin-bottom: 0.5rem;
}
.container h1 {
    margin-bottom: 30px;
    font-size: 2rem;
    color: #fff;
}
.icon {
    margin-right: 0.5rem;
}
.webinar-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
}
.webinar-button:hover {
    background-color: #0056b3;
}
.modal-body img {
    width: 100%;
    height: auto;
}
.faq-section {
    position: relative;
}
.faq-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.faq-button:hover {
    background-color: #218838;
}
.faq-content {
    display: none;
    position: absolute;
    bottom: 100%;
    left: 0;
    background-color: #fff;
    color: #000;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 10;
    max-height: 200px;
    overflow-y: auto;
}
.faq-section:hover .faq-content {
    display: block;
}
</style>
</head>
<body>
<div class="container mt-5">
<h1 class="text-center">Class Listings</h1>
<div class="row">
    @foreach($classes as $class)
    <div class="col-md-4 mb-4">
        <div class="class-card">
            <img src="{{ $class['teachers']['profile_image'] }}" 
                onerror="this.src='https://via.placeholder.com/600x400?text=No+Image';" 
                alt="Teacher Image">
            <div class="class-card-body">
                <h5 class="card-title">{{ $class['teachers']['name'] }}</h5>
                <p class="card-text"><i class="fas fa-star icon"></i><strong>Rating:</strong> {{ $class['teachers']['rating'] }}/5</p>
                <p class="card-text"><i class="fas fa-users icon"></i><strong>Students Learned:</strong> {{ $class['teachers']['students_learn'] }}</p>
                <p class="card-text"><i class="fas fa-clock icon"></i><strong>Teaching Hours:</strong> {{ $class['teachers']['teaching_hours'] }} hours</p>
                <p class="card-text"><i class="fas fa-briefcase icon"></i><strong>Expertise:</strong> {{ $class['teachers']['expertise'] }}</p>
                <p class="card-text"><i class="fas fa-suitcase icon"></i><strong>Trading Style:</strong> {{ $class['teachers']['trading_style'] }}</p>
                <p class="card-text"><i class="fas fa-book icon"></i><strong>Bio:</strong> {{ $class['teachers']['bio'] }}</p>

                <!-- Button to Open the Modal -->
                <button class="webinar-button" type="button" data-bs-toggle="modal" data-bs-target="#classModal-{{ $loop->index }}">
                    Show Details
                </button>

                <!-- Modal -->
                <div class="modal fade" id="classModal-{{ $loop->index }}" tabindex="-1" aria-labelledby="classModalLabel-{{ $loop->index }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="classModalLabel-{{ $loop->index }}">{{ $class['teachers']['name'] }} - Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $class['image'] }}" class="img-fluid mb-3" alt="Class Image">
                                <p><strong>Description:</strong> {!! $class['description'] !!}</p>
                                <p><strong>Start Date & Time:</strong> {{ \Carbon\Carbon::parse($class['start_datetime'])->format('Y-m-d H:i:s') }}</p>
                                <p><strong>End Date & Time:</strong> {{ \Carbon\Carbon::parse($class['end_datetime'])->format('Y-m-d H:i:s') }}</p>
                                <p><strong>Price:</strong> ${{ $class['price'] }}</p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ $class['host_link'] }}" class="btn btn-primary" target="_blank">Join Class</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <!-- FAQ Section -->
                                <div class="faq-section">
                                    <button class="faq-button" type="button">FAQ</button>
                                    <div class="faq-content">
                                        @foreach($class['static_faq'] as $faq)
                                            <p><strong>Q:</strong> {{ $faq['question'] }}</p>
                                            <p><strong>A:</strong> {{ $faq['answer'] }}</p>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
