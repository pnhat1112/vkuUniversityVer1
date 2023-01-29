 // function to set a given theme/color-scheme
        function setTheme(themeName) {
            localStorage.setItem('theme', themeName);
            document.documentElement.className = themeName;
        }

        // function to toggle between light and dark theme
        function toggleTheme(url) {
            if (localStorage.getItem('theme') === 'theme-dark') {
                // document.getElementById('bglogo').style.data-background-color = "white";
                $(".logo-header").attr("data-background-color", "purple");
                $(".navbar-header").attr("data-background-color", "purple");
                $("body").css("background-color", "#e6e6e6");
                $("span").css("color", "#ffffff");
                $(".sidebar").attr("data-background-color", "purple");
                $(".sidebar").css("background-color", "6861CE");
                setTheme('theme-light');
                var nav = 'purple';
                var side = 'purple';
                var bg = 'e6e6e6';
                var span = 'ffffff';
                var _token = $('input[value="_token"]').val();
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                      nav: nav,
                      side: side,
                      bg: bg,
                      span: span,
                      _token: _token
                    },
                    success: function(data) {
                            // alert(data)
                            // alert('hello');
                          }
                        });
            } else {
                $(".logo-header").attr("data-background-color", "blue");
                $(".navbar-header").attr("data-background-color", "blue");
                $(".sidebar").attr("data-background-color", "dark");
                $(".sidebar").css("background-color", "1A2035");
                $("body").css("background-color", "#fffff");
                setTheme('theme-dark');
                var nav = 'blue';
                var side = 'dark';
                var bg = 'ffffff';
                var span = '000000';
                var _token = $('input[value="_token"]').val();
                // $(.logo-header).css("data-background-color","red");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                      nav: nav,
                      side: side,
                      bg: bg,
                      span: span,
                      _token: _token
                    },
                    success: function(data) {
                            // alert(data)
                            // alert('hello');
                          }
                        });
            }
        }

        // Immediately invoked function to set the theme on initial load
        (function () {
            if (localStorage.getItem('theme') === 'theme-dark') {
                setTheme('theme-dark');
                document.getElementById('slider').checked = false;
            } else {
                setTheme('theme-light');
              document.getElementById('slider').checked = true;
            }
        })();