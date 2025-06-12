<?php
include('partials/header.php');
class ArsenalHistoryPage {
    private $title;
    private $historySections;

    public function __construct() {
        $this->title = "Arsenal FC - History";
        $this->historySections = [
            [
                'title' => 'Early Days',
                'image' => 'image/Early.jpg',
                'content' => 'Founded in 1886 as Dial Square, Arsenal began as a team of munitions workers in Woolwich. They joined the Football League in 1893.'
            ],
            [
                'title' => 'The Glory Years',
                'image' => 'image/1930.jpg',
                'content' => 'Under Herbert Chapman in the 1930s and later Arsène Wenger, Arsenal became one of England’s most successful clubs.'
            ],
            [
                'title' => 'The Invincibles',
                'image' => 'image/invinc.avif',
                'content' => 'In the 2003–04 season, Arsenal went unbeaten in the Premier League — a feat unmatched in the modern era.'
            ],
            [
                'title' => 'Modern Era',
                'image' => 'image/2025.webp',
                'content' => 'Now under Mikel Arteta, Arsenal are blending young talent and tradition as they chase new trophies.'
            ]
        ];
    }

    public function render() {
    echo '<div class="container mt-5">';
    echo "<h1 class='text-center mb-4'>{$this->title}</h1>";
    echo '<div class="row">';

    foreach ($this->historySections as $section) {
        echo '
            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <img src="' . $section['image'] . '" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="' . $section['title'] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $section['title'] . '</h5>
                        <p class="card-text">' . $section['content'] . '</p>
                    </div>
                </div>
            </div>';
    }

    echo '</div>'; // zatvorenie row
    echo '</div>'; // zatvorenie container
}

}

    

// Instantiate and render the page
$page = new ArsenalHistoryPage();
$page->render();
?>

<?php
include("partials/footer.php")

?>