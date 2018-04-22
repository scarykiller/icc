

function foo(){
    console.log(a);



}

    function bar() {

        function foo() {
            console.log(a);

            var a = 3;

        }

        foo();

    }

var a =2;


bar();