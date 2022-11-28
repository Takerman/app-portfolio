namespace Tanyo.Portfolio.Web.Models
{
    public class ErrorModel
    {
        public string RequestId { get; set; }

        public bool ShowRequestId => !string.IsNullOrEmpty(RequestId);

        public int Code { get; internal set; }
    }
}