using System.ComponentModel.DataAnnotations;

public static class AllExtensions
{
    public static string GetDisplay(this Enum e)
    {
        var display = e.GetType().GetMember(e.ToString())[0]
            .GetCustomAttributes(typeof(DisplayAttribute), inherit: false)[0]
            as DisplayAttribute;

        return display.Name;
    }
}