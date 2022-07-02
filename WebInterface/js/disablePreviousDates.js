var today = new Date().toISOString().slice(0, 16);

document.getElementsByName("datetime")[0].min = today;