function isValidDateAndTime() {
  //var bits = s.split('/');
  //var y = bits[2], m  = bits[1], d = bits[0];
  d=parseInt($('#deadlineDay').val()),m=parseInt($('#deadlineMonth').val()),y=parseInt($('#deadlineYear').val());
  h=parseInt($('#deadlineHour').val()),i=parseInt($('#deadlineMinute').val());
  if(isNaN(d)||d<=0){
    showInvalid();
    return false;
  }
  if(isNaN(m)||d<=0){
    showInvalid();
    return false;
  }
  if(isNaN(y)||d<=0){
    showInvalid();
    return false;
  }
  if(isNaN(h)||d<=0){
    showInvalid();
    return false;
  }
  if(isNaN(i)||d<=0){
    showInvalid();
    return false;
  }  
  // Assume not leap year by default (note zero index for Jan)
  var daysInMonth = [31,28,31,30,31,30,31,31,30,31,30,31];

  // If evenly divisible by 4 and not evenly divisible by 100,
  // or is evenly divisible by 400, then a leap year
  if ( (!(y % 4) && y % 100) || !(y % 400)) {
    daysInMonth[1] = 29;
  }  
  if(d<=daysInMonth[m-1]){
    $('#selectedTS').text(d+'-'+m+'-'+y+' '+h+':'+i);
    $('#hiddenField0').val('20'+((y<10)?('0'+y):y)+'-'+((m<10)?('0'+m):m)+'-'+((d<10)?('0'+d):d)+' '+((h<10)?('0'+h):h)+':'+((i<10)?('0'+i):i));
    return true;
  }
  else{
    showInvalid();
    return false;
  }
}

function showInvalid(e){
  $('#selectedTS').html('<font color="red">Invalid Date and Time</font>');
}

function submitForm(){
  if(isValidDateAndTime())
    $('#details').submit();
  else
    return false;
}