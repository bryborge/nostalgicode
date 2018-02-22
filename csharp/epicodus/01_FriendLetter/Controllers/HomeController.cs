using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using FriendLetter.Models;

namespace FriendLetter.Controllers
{
    public class HomeController : Controller
    {
        [Route("/")]
        public ActionResult Hello()
        {
            LetterVariable myLetterVariable = new LetterVariable();
            myLetterVariable.SetSender("ENTER SENDER NAME HERE");
            myLetterVariable.SetRecipient("ENTER RECIPIENT NAME HERE");
            return View(myLetterVariable);
        }

        [Route("/form")]
        public ActionResult Form()
        {
            return View();
        }

        [Route("/greeting_card")]
        public ActionResult GreetingCard()
        {
            LetterVariable myLetterVariable = new LetterVariable();
            myLetterVariable.SetSender(Request.Query["sender"]);
            myLetterVariable.SetRecipient(Request.Query["recipient"]);
            return View("Hello", myLetterVariable);
        }
    }
}
