document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var request = window.location.search.match(/[a-z]+/g);
  const elTabs = M.Tabs.getInstance(document.getElementById('tabs'));
  console.log(elTabs);
  if (request && request[0] !== 'type') {
    console.log(request[0]);
    elTabs.select(request[0]);
  }
});
