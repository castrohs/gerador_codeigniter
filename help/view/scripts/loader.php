
<style>
.loader {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #3498db;
  /*border-bottom: 6px solid #3498db;*/
  width: 60px;
  height: 60px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


<!--
<div class="loader center-block" ></div>
outros loaders

.loader {
 border-top: 16px solid blue;
 border-right: 16px solid green;
 border-bottom: 16px solid red;
 border-left: 16px solid pink;
}

-->
