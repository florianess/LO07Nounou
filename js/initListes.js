document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var request = window.location.search.match(/[a-z]+/g);
  const elTabs = M.Tabs.getInstance(document.getElementById('tabs'));
  if (request && request[0] !== 'type') {
    elTabs.select(request[0]);
  }
});
