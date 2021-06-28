<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Pagination</title>
</head>
 
<body>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>name</th>
        </tr>
      </thead>
      <tbody id="letterList">
      </tbody>
    </table>
    <div>
      <button class="btn" onclick="firstPage()">|<</button>
          <button class="btn" onclick="previous()">
            <</button>
              <span id="pageInfo"></span>
              <button class="btn" onclick="nextPage()">></button>
              <button class="btn" onclick="lastPage()">>|</button>
    </div>
  </div>
  <script>
      let letterList = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
showList();
function showList(){
    let tableList = "";
    for(let i = 0; i < letterList.lenght;i++){
      if(i<letterList.length){
        tableList += `
        <tr>
          <td>${letterList[i]}</td>
        </tr>
      `  
      }
    }
    document.getElementById('letterList').innerHTML=tableList;
   // showPageInfo();
  }
  </script>
</body>
 
</html>