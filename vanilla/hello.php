<?php
    require_once 'person.php'; 

    $name = 'Tommy';
    $age = 25;
    $visible = true;

    $person = new Person("ALice",30,"@alice");
    $profile = renderPersonProfile($person);

    $hobbies = [ 'music', 'sports', 'travel'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?php echo $name; ?>!</h1>
    <p><?php echo "My age is $age. "; ?></p>
    <?php
        echo "<p>Profile is  ";
        if($visible) echo "visible. ";
        else echo "invisible";
        echo ($visible) ? " (O)" : " (X)" 
     ?>
    <?php if($visible) echo $profile; ?>
    <?php  echo renderPersonProfile(new Person(null,99,"foo@bar"));       ?>

    <?php echo $person?->print();  ?>

    <?php 
        [$a, $b, $c] = $hobbies;
        echo <<<HTML
            <p class="line">My first hobby is $a</p>
            <p class="line">My second hobby is $b</p>
            <p class="line">My third hobby is $c</p>
        HTML;
    ?>

    <?php
        function show_sum(...$nums){
            $sum = array_sum(($nums));
            $ip = implode(', ',$nums);

            echo <<<HTML
                <p class="line">Sum of [$ip]  = $sum  </p>
            HTML;
        }
        
        show_sum(1,2,3);        
        
        $l1 = [4,5,6];
        $l2 = array_map(fn($l)=> $l * 2 ,$l1);
        show_sum(...$l1,...$l2);

        show_sum(31,32,33);     
    ?>

    <?php
        function render_img($src,$alt,$class,$style){
            return <<<HTML
                <img class="$class" alt="$alt" src="$src" style="$style" />
            HTML;
        }

        echo render_img(
            src: "/icon.svg",
            alt: "no im soz",
            class: " img icon ",
            style: " width: 40px;"
        );
    ?>

    <?php
        $status = 400;
        enum Statuses: int {
            case OK = 200;
            case NA = 400;
            case ERROR = 500;
        }
        
        $enum = match($status){
            Statuses::OK => ' received',
            Statuses::NA => ' wrong path',
            Statuses::ERROR => ' something wen wrong',
            default => ' not sure what happened here'
        };
        
        $str = match($status){
            200,300 => "OK",
            400 => "NOT FOUND",
            500 => "woops - something wen wrong"
        };
            
        $codes = <<<HTML
                <p> Status $status : $str</p>
                <p> Code enumed is $enum </p>
            HTML;

        echo $codes;
    ?>

    <?php
        function add(int $a, int $b): string {
            $x = $a + $b;
            return " $a + $b = $x";
        }
        echo add(123,456);
    ?>
    <div>
        <a href="/">Back</a>
    </div>
</body>
</html>
