<html>
    <head>
    </head>
    <body>
        <table id="example">
            <tr>
                <td class="count-me">12</td>
                <td>Some value</td>
            </tr>
            <tr>
                <td class="count-me">2</td>
                <td>Some value</td>
            </tr>
            <tr>
                <td class="count-me">17</td>
                <td>Some value</td>
            </tr>
        </table>
        <script language="javascript" type="text/javascript">




            var tds = document.getElementById('example').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
            document.getElementById('example').innerHTML += '<tr><td>' + sum + '</td><td>total</td></tr>';


            
        </script>
    </body>
</html>